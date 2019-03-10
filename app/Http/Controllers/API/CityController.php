<?php

namespace App\Http\Controllers\API;

use App\CityQuarter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\City;
use App\CityState;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allData = City::all();
        foreach($allData as $data)
        {
            $subData = CityState::where('cityId' , $data->id)->get();
            $data->state = $subData;
        }
        if (count($allData) > 0 ) {
            return response()->json([
                'success' => true,
                'data' => $allData
            ]);
        } else if (count($allData) <= 0 ) {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function getCity(Request $request)
    {
       $cityId = $request->cityId;
       $allCity = CityState::where('cityId' , $cityId)->get();
     //  var_dump($cityId);
       return  view('admin.city.city')->with([ 'allCity' => $allCity]);

    }

    public function getSubCity(Request $request)
    {
        $cityId = $request->cityId;
        $allSubCity = CityQuarter::where('stateId' , $cityId)->get();
        return  view('admin.city.getCity')->with([ 'allSubCity' => $allSubCity]);

    }
}
