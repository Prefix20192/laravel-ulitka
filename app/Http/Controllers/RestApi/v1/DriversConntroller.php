<?php

namespace App\Http\Controllers\RestApi\v1;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriversConntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Driver::all();
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
                "FIO" => ["required"],
                "Passport" => ["required"],
                "Date_of_birth" => ["required"],
                "car_id" => ["required"]
            ]
        );
        if($validator->fails()){
            return [
                "status" => false,
                "errors" => $validator->messages()
            ];
        }

        $Drivers = Driver::create([
            "FIO" => $request->FIO,
            "Passport" => $request->Passport,
            "Date_of_birth" => $request->Date_of_birth,
            "car_id" => $request->car_id
        ]);
        return [
            "status" => true,
            "data" => $Drivers
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
        $d_show = Driver::find($id);
        if(!$d_show){
            return response()->json([
                "status" => false,
                "messange" => "Not Found Drivers"
            ])->setStatusCode(404);
        }

        return $d_show;

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
