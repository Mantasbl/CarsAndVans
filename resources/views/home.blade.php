@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/index_car_display.scss') }}" rel="stylesheet">
<link href="{{ asset('css/index_jumbotron.scss') }}" rel="stylesheet">
<link href="{{ asset('css/car_card.scss') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="jumbotron ">
            <h1 class="display-4 font-weight-bold text-center">Let's find your perfect vehicle</h1>
            <p class="lead text-center">Browse online or visit us in our dealerships to find your ideal car today.</p>
            <hr class="my-4">
            <div class="car-search d-flex justify-content-center">
                <form action="">
                    <p>Quick Search:</p>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <select name="carMake" id="inputState" class="form-control">
                                <option selected>Any Make</option>
                                @foreach($searchOptionsMake as $makeOption)
                                <option value="{{$makeOption->make}}">{{$makeOption->make}} ({{$makeOption->count}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select name="carModel" id="inputState" class="form-control">
                                <option selected>Any Model</option>
                                @foreach($searchOptionsModel as $modelOption)
                                <option value="{{$modelOption->car_model}}">{{$modelOption->car_model}} ({{$modelOption->count}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <select id="inputState" class="form-control">
                                <option selected>Price (Max)</option>
                                @for ($i = 1000; $i <= 15000; $i+=1000)
                                <option>£ {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary col-md-1" style="height: 38px;">Search</button>
                    </div>
                </form>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -10 75 110" preserveAspectRatio="none">
                <polygon fill="white" points="0,100 100,0 100,100"/>
            </svg>
        </div>
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
                            @include('cars.cars_card')
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
<script src="{{ asset('js/car_card.js') }}"></script>

@endsection
