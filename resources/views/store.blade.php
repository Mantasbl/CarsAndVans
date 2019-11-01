@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/car_card.scss') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container text-center my-3">
    <div class="form-group">

    <input type="text" class="form-controller" id="search" name="search" value="">
    <input type="text" class="form-controller" id="search2" name="search2" value="">


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
<script type="text/javascript">
        const search = document.getElementById('search');
        const tableBody = document.getElementById('card-columns');
        function getContent(){
        
        const searchValue = search.value;
        
            const xhr = new XMLHttpRequest();
            xhr.open('GET','{{route('search')}}/?search=' + searchValue ,true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function() {
                
                if(xhr.readyState == 4 && xhr.status == 200)
                {
                    tableBody.innerHTML = xhr.responseText;
                }
            }
            xhr.send()
        }
        search.addEventListener('input',getContent);
</script>
@endsection
