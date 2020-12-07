@extends('layouts.app')


@section('content')

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('img/procesos.jpg')}}"  class="d-block w-100" style="width: 100px; height: 400px;" >
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/logistica.jpg')}}" class="d-block w-100" style="width: 100px; height: 400px;" >
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/inventario.jpg')}}"   class="d-block w-100" style="width: 100px; height: 400px;" >
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
<br>
<!--
<h2 style="text-align:center; ">Video instructivo</h2>
<br>

<div>
  <video src="" style="max-width:100%; max-height:100%"></video>
</div>
-->
<div id="content" style=" padding: 100px 100px 200px 100px; ">
    <div style="float:left;" class="col-md-5">
      <div class="form-group">
        <h2>Misión</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
          Non assumenda nostrum illum cum. Eum, autem? Sit fugit, velit 
          quisquam molestias eos, ex sequi sunt mollitia, omnis porro voluptas 
          placeat optio.</p>

      </div>
    </div>
    <div style="float:right;" class="col-md-5">
        <div class="form-group">
          <h2>Visión</h2>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Non assumenda nostrum illum cum. Eum, autem? Sit fugit, velit 
            quisquam molestias eos, ex sequi sunt mollitia, omnis porro voluptas 
            placeat optio.</p>

        </div>
    </div>
</div>




 


@endsection