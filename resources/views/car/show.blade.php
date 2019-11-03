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
            <h2 class="font-weight-bold car-show-title">
                {{strtoupper($car->make . " " . $car->car_model . " " . $car->body_style) }}</h2>
            <img class="" src="/assets/car_images/{{$car->image}}" width=100%>

            <ul class="nav nav-pills mb-3 mt-5" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link car-show-pill font-weight-bold active" id="pills-home-tab" data-toggle="pill"
                        href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">VEHICLE
                        DESCRIPTION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link car-show-pill font-weight-bold" id="pills-profile-tab" data-toggle="pill"
                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                        aria-selected="false">FEATURES</a>
                </li>
                
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <h4 class="mt-5 mb-4">{{$car->description_title}}</h4>
                    <p>
                        {{$car->description_content}}
                    </p>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <span class="btn collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Interior / Exterior features
                                    </span>
                                </h5>
                            </div>
                            @php

                            $interior_features = explode(",", $car->interior_feature);
                            $exterior_features = explode(",", $car->exterior_feature);
                            $safety_features = explode(",", $car->safety_feature);
                            $other_features = explode(",", $car->other_feature);

                            @endphp
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="text-center">Interior</p>

                                            @foreach ($interior_features as $feature)
                                            @if ($feature)
                                            <p>{{$feature}}</p>
                                            @else
                                            <p>No features available</p>
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="col-6">
                                            <p class="text-center">Exterior</p>

                                            @foreach ($exterior_features as $feature)
                                            @if ($feature)
                                            <p>{{$feature}}</p>
                                            @else
                                            <p>No features available</p>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <span class="btn collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Safety / Exterior features
                                    </span>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="text-center">Safety</p>

                                            @foreach ($safety_features as $feature)
                                            @if ($feature)
                                            <p>{{$feature}}</p>
                                            @else
                                            <p>No features available</p>
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="col-6">
                                            <p class="text-center">Other</p>

                                            @foreach ($other_features as $feature)
                                            @if ($feature)
                                            <p>{{$feature}}</p>
                                            @else
                                            <p>No features available</p>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...
                </div>
            </div>
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
