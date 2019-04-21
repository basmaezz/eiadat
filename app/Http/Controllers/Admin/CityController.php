<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.city.index')->with('allData', $allData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
        ]);
        //inserted
        $inserted =  new City();
        $inserted->city = $request->input('city' );
        $inserted->city_ar = $request->input('city_ar' );
        $inserted->save();
        return redirect()->action('Admin\CityController@index');
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
        $editData = City::find($id);
        return  view('admin.city.edit')->with('editData', $editData);
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
        $this->validate($request, [
            'city' => 'required',
        ]);
        //update
        $update =  City::find($id);
        $update->city = $request->input('city' );
        $update->city_ar = $request->input('city_ar' );
        $update->save();
        return redirect()->action('Admin\CityController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delcity($id)
    {
        City::where('id', $id)->delete();
        CityState::where('cityId', $id)->delete();
        return redirect()->action('Admin\CityController@index');
    }


    public function getCity(Request $request)
    {
       $cityId = $request->cityId;
       $allCity = CityState::where('cityId' , $cityId)->get();
//       var_dump($cityId);
       return  view('admin.city.city')->with([ 'allCity' => $allCity]);

    }

    public function getSubCity(Request $request)
    {
        $cityId = $request->cityId;
        $allSubCity = CityQuarter::where('stateId' , $cityId)->get();
        return  view('admin.city.getCity')->with([ 'allSubCity' => $allSubCity]);

    }
}
