<?php

namespace App\Http\Controllers\RestApi\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Validator;

class CarConntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Car::all();
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
        $validator = Validator::make(
            $request->all(),[
                "car_brand" => ["required"],
                "car_name" => ["required"],
                "characteristic" => ["required"],
                "car_status" => ["required"]
            ]
        );
        if($validator->fails()){
            return [
                "status" => false,
                "errors" => $validator->messages()
            ];
        }

//        if($request->car_status == '1'){
//            $car_stats = "активная";
//        }elseif($request->car_status == '2'){
//            $car_stats = "на ремонте";
//        }elseif($request->car_status == '3'){
//            $car_stats = "продана";
//        }elseif($request->car_status == '4'){
//            $car_stats = "активная";
//        }else{
//            $car_stats = "не используется";
//        }

        $Carts = Car::create([
            "car_brand" => $request->car_brand,
            "car_name" => $request->car_name,
            "characteristic" => $request->characteristic,
            "car_status" => $request->car_status
        ]);
        return [
            "status" => true,
            "data" => $Carts
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car_show = Car::find($id);
        if(!$car_show){
            return response()->json([
                "status" => false,
                "messange" => "Not Found Drivers"
            ])->setStatusCode(404);
        }

        return $car_show;
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
