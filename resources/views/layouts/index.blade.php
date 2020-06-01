@extends('layouts.app')

@section('content')
  <!-- Header - set the background image for the header in the line below -->


    @foreach($data as $d)

    <section class="py-5 bg-image-full" style="background-image: url('{{asset('image/'.$d->id)}}');">
        <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
        <div style="height: 200px;"></div>
      </section>

      <!-- Content section -->
      <section class="py-5">
        <div class="container">
        <h1>{{$d->titre}}</h1>

        <p>{{$d->desc}}</p>
        </div>
      </section>

    @endforeach

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->

  <script src="{{ asset('js/jq.js')}}"></script>

  @endsection
