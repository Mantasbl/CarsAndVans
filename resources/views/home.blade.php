@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/index_car_display.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/lightslider.css" />                  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/lightslider.js"></script>
@endsection

@section('content')

<div class="jumbotron">
    <h1 class="display-4">Hello, world!</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
        featured content or information.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
</div>

<!-- Car carousel -->
<div class="container text-center my-3">
    <h2 class="font-weight-bold">Our latest offers</h2>
    <div class="row mx-auto my-auto">
        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner w-100" role="listbox">
                @php $loopOnce = false; @endphp
                @foreach($cars as $key=>$car)
                    
                    @if ($loopOnce === false)
                        <div class="carousel-item active">
                        @php $loopOnce = true; @endphp
                    @else
                        <div class="carousel-item">
                    @endif
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex justify-content-center">
                            <a href="#">
                            <div class="card" style="width: 20rem;">
                                <div class="card-body">
                                    <div class="card-title font-weight-bold text-left">{{strtoupper($car->make . " " . $car->car_model . " " . $car->body_style)}}</div>
                                    <div class="card-text text-left" style="font-size: 12px">{{$car->year_of_reg . " " . round($car->engine_size / 1000, 1) . "L " . $car->number_of_doors . "DR"}}</div>
                                    <div></div>
                                </div>
                                <img class="card-img-top" src="/assets/car_images/{{$car->image}}">
                                    <div class="d-flex justify-content-center card-prices">
                                        <span class="card-price col-6 font-weight-bold">£{{round($car->price)}}</span>
                                        <span class="card-price col-6 font-weight-bold" data-toggle="tooltip" data-placement="top" title="Estimated monthly payment for 48 months">£{{round($car->price / 48)}} <i class="mdi mdi-information-outline" style="font-size: 18px;"></i></span>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <span class="col-1 card-icon"><i class="mdi mdi-fuel"></i></span>
                                        <span class="col-5 card-attribute">{{$car->fuel_type}}</span>
                                        <span class="col-1 card-icon"><i class="mdi mdi-car"></i></span>
                                        <span class="col-5 card-attribute">{{$car->body_style}}</span>
                                    </div>
                                    <div class="d-flex justify-content-center" >
                                        <span class="col-1 card-icon"><i class="mdi mdi-car-shift-pattern"></i></span>
                                        <span class="col-5 card-attribute">{{$car->transmission}}</span>
                                        <span class="col-1 card-icon"><i class="mdi mdi-water"></i></span>
                                        <span class="col-5 card-attribute">{{$car->mileage}} mls</span>
                                    </div>
                            </div>
                          </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev" style="margin-right: 5em;">
                <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle"
                    aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle"
                    aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>











@endsection

@section('script')
<script src="{{ asset('js/index_car_display.js') }}"></script>
@endsection
