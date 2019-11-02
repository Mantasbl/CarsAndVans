<a href="/car/{{$car->id}}">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <div class="card-title font-weight-bold text-left">
                {{strtoupper($car->make . " " . $car->car_model . " " . $car->body_style)}}</div>
            <div class="card-text text-left" style="font-size: 12px">
                {{$car->year_of_reg . " " . round($car->engine_size / 1000, 1) . "L " . $car->number_of_doors . "DR"}}</div>
            <div></div>
        </div>
        <img class="card-img-top" src="/assets/car_images/{{$car->image}}">
        <div class="d-flex justify-content-center card-prices">
            <span class="card-price col-6 font-weight-bold">£{{round($car->price)}}</span>
            <span class="card-price col-6 font-weight-bold" data-toggle="tooltip" data-placement="top"
                title="Estimated monthly payment for 48 months">£{{round($car->price / 48)}} <i
                    class="mdi mdi-information-outline" style="font-size: 18px;"></i></span>
        </div>
        <div class="d-flex justify-content-center">
            <span class="col-1 card-icon"><i class="mdi mdi-fuel"></i></span>
            <span class="col-5 card-attribute">{{$car->fuel_type}}</span>
            <span class="col-1 card-icon"><i class="mdi mdi-car"></i></span>
            <span class="col-5 card-attribute">{{$car->body_style}}</span>
        </div>
        <div class="d-flex justify-content-center">
            <span class="col-1 card-icon"><i class="mdi mdi-car-shift-pattern"></i></span>
            <span class="col-5 card-attribute">{{$car->transmission}}</span>
            <span class="col-1 card-icon"><i class="mdi mdi-water"></i></span>
            <span class="col-5 card-attribute">{{$car->mileage}} mls</span>
        </div>
    </div>
</a>
