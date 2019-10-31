@extends('layouts.app')

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
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"></h5>
    <a href="#" class="btn btn-primary"></a>
    <a href="#" class="btn btn-primary">Reserve now</a>
  </div>
    @foreach($cars as $car)
    <p class="card-text">{{$car->description_title}}</p>
    <a href="#" class="btn btn-primary">{{$car->interior_feature}}</a>
    <a href="#" class="btn btn-primary">{{$car->transmission}}</a>
    @endforeach
</div>

@endsection