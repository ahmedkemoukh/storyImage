<?php

namespace App\Http\Controllers;

use App\image;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\File;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=image::imagejoinuser();

        return view('layouts.index',compact('data'));
    }
    public function addStory()
    {
        return view('layouts.addStory');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $this->validate($request, ["fileup" =>'required|mimes:jpeg,bmp,png,jpeg',"title"=>'required',"desc"=>'required']);




          $image = $request->file('fileup');
          $new_name = hexdec(uniqid());
         $image->move(public_path('image'), $new_name);



         image::create(['id'=>$new_name,'user'=>auth()->user()->id,'titre'=>$request->input('title'),'desc'=>$request->input('desc')]);



    return redirect('/story');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {

        $data=User::find($user)->images()->get();

        return view('layouts.showHome',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ["fileup" =>'mimes:jpeg,bmp,png,jpeg',"title"=>'required',"desc"=>'required']);
        if($request->file('fileup')!=null)
        {
        $image = $request->file('fileup');


       $image->move(public_path('image'), $id);
        }
       $story=image::find($id);
       $story->update($request->all());
       return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        File::delete(public_path('image').'\\'.$id);
        $image=image::find($id);
        $image->delete();
          return redirect()->back();
    }
}
