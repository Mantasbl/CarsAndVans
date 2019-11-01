@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/car_card.scss') }}" rel="stylesheet">
@endsection

@section('content')
    @foreach($cars as $car)
        <div class="container">
                    
        </div>
    @endforeach
@endsection

@section('script')
<script src="{{ asset('js/car_card.js') }}"></script>
@endsection
