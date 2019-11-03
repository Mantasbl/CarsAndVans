@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/car_card.scss') }}" rel="stylesheet">
<link href="{{ asset('css/store_search.scss') }}" rel="stylesheet">

@endsection

@section('content')
<div class="container text-center my-3">
    <div class="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <span class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Search
                    </span>
                </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="{{ route('car.filter') }}" method="GET">
                        @csrf
                        <div class="row justify-content-center">
                            <select name="make" class="form-control mx-3 my-2 col-md-3" onchange="this.form.submit()">
                                <option selected value="">Any Make</option>
                                @foreach($makeOptions as $make)
                                <option value="{{$make}}">{{$make}}</option>
                                @endforeach
                            </select>
                            <select name="car_model" class="form-control mx-3 my-2 col-md-3"
                                onchange="this.form.submit()">
                                <option selected value="">Any Model</option>
                                @foreach($carModelOptions as $model)
                                <option value="{{$model}}">{{$model}}</option>
                                @endforeach
                            </select>
                            <select name="price" class="form-control mx-3 my-2 col-md-3">
                                <option selected value="254524">Price (Max)</option>
                                @for ($i = 1000; $i <= 15000; $i+=1000) <option value="{{$i}}">£ {{$i}}</option>
                                    @endfor
                            </select>
                            <select name="transmission" class="form-control mx-3 my-2 col-md-3">
                                <option selected value="">Transmission</option>
                                @foreach($transmissionOptions as $transmission)
                                <option value="{{$transmission}}">{{$transmission}}</option>
                                @endforeach
                            </select>
                            <select name="body_style" class="form-control mx-3 my-2 col-md-2">
                                <option selected value="">Body Style</option>
                                @foreach($bodyStyleOptions as $body_style)
                                <option value="{{$body_style}}">{{$body_style}}</option>
                                @endforeach
                            </select>
                            <select name="fuel_type" class="form-control mx-3 my-2 col-2">
                                <option selected value="">Fuel Type</option>
                                @foreach($fuelTypeOptions as $fuel_type)
                                <option value="{{$fuel_type}}">{{$fuel_type}}</option>
                                @endforeach
                            </select>
                            <select name="colour" class="form-control mx-3 my-2 col-2">
                                <option selected value="">Colour</option>
                                @foreach($colourOptions as $colour)
                                <option value="{{$colour}}">{{$colour}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row justify-content-center">
                            <div class="control">
                                <button class="btn btn-primary mr-5">Submit</button>
                            </div>
                            <div>
                                <button class="btn btn-primary" href="/search">Reset search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h2 class="font-weight-bold">Our latest offers</h2>
    <div id="card-columns" class="card-columns">
        @foreach($cars as $car)
        <a href="">
            @include('cars.cars_card')
        </a>
        @endforeach
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/car_card.js') }}"></script>

@endsection
