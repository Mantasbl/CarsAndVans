<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Car;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = DB::table('cars')
        ->join('car_features', 'cars.car_feature_id', '=', 'car_features.id')
        ->join('car_models', 'cars.model_id', '=', 'car_models.id')
        ->join('makes', 'car_models.make_id', '=', 'makes.id')
        ->join('model_details', 'car_models.model_detail_id', '=', 'model_details.id')
        ->join('body_styles', 'model_details.body_style_id', '=', 'body_styles.id')
        ->join('fuel_types', 'model_details.fuel_type_id', '=', 'fuel_types.id')
        ->join('engines', 'model_details.engine_id', '=', 'engines.id')
        ->join('transmissions', 'engines.transmission_id', '=', 'transmissions.id');

        $cars = $db
                ->select('cars.id', 'make', 'car_model', 'engine_size', 'price', 'engine_power', 'image', 'body_style', 'year_of_reg', 'number_of_doors', 'fuel_type', 'transmission', 'mileage')
                ->get();
        
        function groupBy($obj, $attribute) {
            $val = array();
            foreach ($obj as $item){
                array_push($val, $item->$attribute);
            }
            $val = array_unique($val);
            return $val;
        }
        $searchOptionsMake = $db->select('make')->get();
        $makeOptions = groupBy($searchOptionsMake, "make");
        return view('home', compact('cars', 'makeOptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        ->where('cars.id', $id)
        ->get();

        return view('car/show', compact('cars'));
    }
    
    //Display searchable cars listings
    public function filter(Request $request) {
        
        $db = DB::table('cars')
        ->join('car_features', 'cars.car_feature_id', '=', 'car_features.id')
        ->join('car_models', 'cars.model_id', '=', 'car_models.id')
        ->join('makes', 'car_models.make_id', '=', 'makes.id')
        ->join('model_details', 'car_models.model_detail_id', '=', 'model_details.id')
        ->join('body_styles', 'model_details.body_style_id', '=', 'body_styles.id')
        ->join('fuel_types', 'model_details.fuel_type_id', '=', 'fuel_types.id')
        ->join('engines', 'model_details.engine_id', '=', 'engines.id')
        ->join('transmissions', 'engines.transmission_id', '=', 'transmissions.id');
        
        //If this is not predefined, none of the listing would appear when accessing /search route
        if (!$request->price) {
            $request->price = 100000;
        }

        $cars = $db
                ->where('make', 'LIKE', $request->make)
                ->where('car_model', 'LIKE', $request->car_model)
                ->where('transmission', 'LIKE', $request->transmission)
                ->where('body_style', 'LIKE', $request->body_style)
                ->where('fuel_type', 'LIKE', $request->fuel_type)
                ->where('colour', 'LIKE', $request->colour)
                ->where('price', '<', intval($request->price))
                ->get();
        // $transmissions = DB::table('transmissions')->select('transmission')->get();
        function groupBy($obj, $attribute) {
           $val = array();
           foreach ($obj as $item){
            array_push($val, $item->$attribute);
           }
           $val = array_unique($val);
           return $val;
        }

        $searchOptionsTransmission = $db->select('transmission')->get();
        $searchOptionsBodyStyle = $db->select('body_style')->get();
        $searchOptionsFuelType = $db->select('fuel_type')->get();
        $searchOptionsColour = $db->select('colour')->get();
        $searchOptionsMake = $db->select('make')->get();
        $searchOptionsModel = $db->select('car_model')->get();
        // $searchOptionsModel = $db->select(DB::raw('COUNT(car_model) as count, car_model'))->groupBy('car_model')->get();
        $transmissionOptions = groupBy($searchOptionsTransmission, "transmission");
        $bodyStyleOptions = groupBy($searchOptionsBodyStyle, "body_style");
        $fuelTypeOptions = groupBy($searchOptionsFuelType, "fuel_type");
        $colourOptions = groupBy($searchOptionsColour, "colour");
        $makeOptions = groupBy($searchOptionsMake, "make");
        $carModelOptions = groupBy($searchOptionsModel, "car_model");
        return view('store', compact('cars', 'colourOptions', 'makeOptions', 'transmissionOptions', 'bodyStyleOptions', 'fuelTypeOptions', 'carModelOptions'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
