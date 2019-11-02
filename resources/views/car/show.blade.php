@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/car_card.scss') }}" rel="stylesheet">
<link href="{{ asset('css/car_show.scss') }}" rel="stylesheet">
@endsection

@section('content')

    @foreach($cars as $car)
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4 font-weight-bold text-center">{{strtoupper($car->make . " " . $car->car_model) }}</h1>

        </div>
    </div>

    <div class="container car-show-container">
        <div class="row">
            <div class="col-8 car-show-content">
                <h2 class="font-weight-bold car-show-title">{{strtoupper($car->make . " " . $car->car_model . " " . $car->body_style) }}</h2>
               <img class="" src="/assets/car_images/{{$car->image}}" width= 100%>
            </div>
            <div class="col-4 car-show-specifications">
                <h1 class="car-show-price">£{{$car->price}}</h1>
                <h4 class="specification-header">SPECIFICATIONS</h4>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>MAKE: </p>
                    <span class="text-right col-5">{{$car->make}}</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>MODEL: </p>
                    <span class="text-right col-5">{{$car->car_model}}</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>YEAR OF REG: </p>
                    <span class="text-right col-5">{{$car->year_of_reg}}</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>MILEAGE: </p>
                    <span class="text-right col-5">{{$car->mileage}} miles</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>YEARLY ROAD TAX: </p>
                    <span class="text-right col-5">£{{$car->yearly_road_tax}}</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>REGISTRATION: </p>
                    <span class="text-right col-5">{{$car->registration}}</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>ENGINE SIZE: </p>
                    <span class="text-right col-5">{{{round($car->engine_size / 1000, 1)}}} L</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>FUEL: </p>
                    <span class="text-right col-5">{{$car->fuel_type}}</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>TRANSMISSION: </p>
                    <span class="text-right col-5">{{$car->transmission}}</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>POWER: </p>
                    <span class="text-right col-5">{{$car->engine_power}} bhp</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>TORQUE: </p>
                    <span class="text-right col-5">{{$car->engine_torque}} lbs/ft</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>CO2 EMMISSIONS: </p>
                    <span class="text-right col-5">{{$car->co2_emission}} CO2 g/km</span>
                </div>
                <div class="row car-show-spec">
                    <p class="text-left col-5"><i class="text-red mdi mdi-menu-right"></i>INSURANCE G: </p>
                    <span class="text-right col-5">{{$car->insurance_group}}</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('script')
<script src="{{ asset('js/car_card.js') }}"></script>
@endsection
