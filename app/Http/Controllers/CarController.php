<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Image;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    
    public function index()
    {

        $cars = DB::table('cars')
                ->join('car_features', 'cars.car_feature_id', '=', 'car_features.id')
                ->join('car_models', 'cars.model_id', '=', 'car_models.id')
                ->join('makes', 'car_models.make_id', '=', 'makes.id')
                ->join('model_details', 'car_models.model_detail_id', '=', 'model_details.id')
                ->join('body_styles', 'model_details.body_style_id', '=', 'body_styles.id')
                ->join('fuel_types', 'model_details.fuel_type_id', '=', 'fuel_types.id')
                ->join('engines', 'model_details.engine_id', '=', 'engines.id')
                ->join('transmissions', 'engines.transmission_id', '=', 'transmissions.id')
                ->select('description_title', 'interior_feature', 'transmission')->get();


        return view('home', compact("cars"));
    }
}
