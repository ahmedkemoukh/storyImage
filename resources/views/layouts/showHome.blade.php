<?php  $i=0;
$division=array("First slide","Second slide","Third slide","langage"); ?>
@extends('layouts.app')

@section('content')
  <!-- Header - set the background image for the header in the line below -->
  <div id="carouselExampleIndicators" class="carousel slide bg-dark container-fluid" >

    <div class="carousel-inner">


        @foreach($data as $d)
@if($i==0)

      <section class="  carousel-item active " style="background-color: rgba(0,0,0, 1);background-image: url('{{asset('image/'.$d->id)}}')" alt="{{$i++}}">
@else
<section class="  carousel-item my-2 " style="background-color: rgba(0,0,0, 1);background-image: url('{{asset('image/'.$d->id)}}')" alt="{{$i++}}">
    @endif


        <div class=" p-1 container-fluid" style="background-color: rgba(0,0,0, 0.5);z-index: 1071;">
                <div class="row justify-content-center ">
                    <div class="col-md-8">
                        <div class="card" style="background-color: rgba(255,255,255, 0.9);z-index: 1071;">
                            <div class="card-header">modify story</div>

                            <div class="card-body">
                            <form method="POST" action="/story/{{$d->id}}"  enctype="multipart/form-data">
                                    {{method_field('PATCH')}}
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">story title</label>

                                        <div class="col-md-6">
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$d->titre}}" required autocomplete="name" autofocus>

                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">story description</label>
                                    <textarea name="desc" value='{{$d->desc}}' class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{$d->desc}}</textarea>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlFile1">add image</label>
                                        <input name="fileup"  type="file" class="form-control-file" id="exampleFormControlFile1">
                                      </div>


                                    <div class="form-group row mb-0">
                                        <div class="col-md-4 offset-md-2">
                                            <button type="submit" class="btn btn-primary">
                                                modify
                                            </button>
                                        </div>
                                        <div class="col-md-4 offset-md-2">

                                            <a class="dropdown-item btn btn-danger" href="#"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form{{$d->id}}').submit();">
                                            remove
                                         </a>





                            </div>
                                    </div>

                                </form>

                            <form id="logout-form{{$d->id}}" action="/story/{{$d->id}}" method="POST" style="display: none;">
                                {{method_field('DELETE')}}
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </section>
          @endforeach

      </div>


    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>



  <!-- Footer -->
  <footer class="py-5 bg-white ">
    <div class="container">
      <p class="m-0 text-center text-dark">Copyright &copy; Your Website 2019</p>

    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->

  <script src="{{ asset('js/jq.js')}}"></script>

  @endsection
