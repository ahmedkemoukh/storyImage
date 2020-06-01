<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use DB;
class image extends Model
{
    protected $fillable = [
        'id','Name','titre','desc','user'
    ];
    public function user()
    {

       return $this->BelongsTo('App\User');
    }


    public static function imagejoinuser()
    {
       return  DB::table('users')
       ->join('images', 'images.user', '=', 'users.id')->get();
    }
}
