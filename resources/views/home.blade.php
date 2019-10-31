@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/index_car_display.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>
<div class="container-fluid">
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            
            @php $firstloop = false; @endphp
            @foreach($cars as $key=>$car)
                @if ($firstloop === false)
                    <div class="carousel-item col-md-3 active">
                        <img class="img-fluid mx-auto d-block" src="/assets/car_images/{{$car->image}}" alt="slide {{++$key}}">
                    </div>
                    @php $firstloop = true; @endphp
                @else
                    <div class="carousel-item col-md-3 ">
                        <img class="img-fluid mx-auto d-block" src="/assets/car_images/{{$car->image}}" alt="slide {{++$key}}">
                    </div>
                @endif
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <i class="fa fa-chevron-left fa-lg text-muted"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
            <i class="fa fa-chevron-right fa-lg text-muted"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/index_car_display.js') }}"></script>
@endsection