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
        

        $searchOptionsMake = $db->select(DB::raw('COUNT(make) as count, make'))->groupBy('make')->get();
        $searchOptionsModel = $db->select(DB::raw('COUNT(car_model) as count, car_model'))->groupBy('car_model')->get();

        return view('home', compact("cars", "searchOptionsMake", "searchOptionsModel"))->with('i', (request()->input('page', 1) - 1) * 20);
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
    public function search(Request $request)
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

        $cars = $db->get();

        if($request->ajax()){
            dd('request');
            $output="";
            $products = $db->where('make','LIKE','%'.$request->search."%")
                        ->orWhere('car_model','LIKE','%'.$request->search."%")
                        ->orWhere('fuel_type','LIKE','%'.$request->search."%")
                        ->orWhere('body_style','LIKE','%'.$request->search."%")
                        ->get();
            
            if($products){
         
               foreach ($products as  $car) {
            //    I am aware of how much of an abomination this is
                $output.=
                    '<a href="#"' . 
                    '<div class="card" style="width: 20rem;">' .
                        '<div class="card-body">' .
                            '<div class="card-title font-weight-bold text-left">' .
                                strtoupper($car->make . " " . $car->car_model . " " . $car->body_style) . '</div>' .
                            '<div class="card-text text-left" style="font-size: 12px">' .
                                $car->year_of_reg . " " . round($car->engine_size / 1000, 1) . "L " . $car->number_of_doors . "DR" . '</div>' .
                            '<div></div>' .
                        '</div>' .
                        '<img class="card-img-top" src="/assets/car_images/' . $car->image . '">' .
                        '<div class="d-flex justify-content-center card-prices">' . 
                            '<span class="card-price col-6 font-weight-bold">£'. round($car->price) . '</span>' .
                            '<span class="card-price col-6 font-weight-bold" data-toggle="tooltip" data-placement="top"' .
                                'title="Estimated monthly payment for 48 months">£' . round($car->price / 48) . ' <i' .
                                    'class="mdi mdi-information-outline" style="font-size: 18px;"></i></span>' .
                        '</div>' .
                        '<div class="d-flex justify-content-center">' .
                            '<span class="col-1 card-icon"><i class="mdi mdi-fuel"></i></span>' .
                            '<span class="col-5 card-attribute">'. $car->fuel_type . '</span>' .
                            '<span class="col-1 card-icon"><i class="mdi mdi-car"></i></span>' .
                            '<span class="col-5 card-attribute">'. $car->body_style . '</span>' .
                        '</div>' .
                        '<div class="d-flex justify-content-center">' .
                            '<span class="col-1 card-icon"><i class="mdi mdi-car-shift-pattern"></i></span>' .
                            '<span class="col-5 card-attribute">'. $car->transmission . '</span>' .
                            '<span class="col-1 card-icon"><i class="mdi mdi-water"></i></span>' .
                            '<span class="col-5 card-attribute">'. $car->mileage . ' mls</span>' .
                        '</div>' .
                    '</div>' . 
                    '</a>';

               }
               return $output;  
            } 
        }
        return view('store', compact('cars'));
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
