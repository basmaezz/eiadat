<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\City;
use App\CityState;

class CityStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allData = CityState::all();
        return view('admin.cityState.index')->with('allData', $allData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCity = City::all();
        return view('admin.cityState.create')->with(['allCity' => $allCity]);
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
            'name_ar' => 'required',
        ]);
        //inserted
        $inserted =  new CityState();
        $inserted->cityId = $request->input('cityId' );
        $inserted->name_ar = $request->input('name_ar' );
        $inserted->name_en = $request->input('name_en' );
        $inserted->save();
        return redirect()->action('Admin\CityStateController@index');
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
        $editData = CityState::find($id);
        $allCity = City::all();
        return  view('admin.cityState.edit')->with(['editData'=> $editData  , 'allCity'=> $allCity]);
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
            'name_ar' => 'required',
        ]);
        //inserted
        $inserted =  CityState::find($id);
        $inserted->cityId = $request->input('cityId' );
        $inserted->name_ar = $request->input('name_ar' );
        $inserted->name_en = $request->input('name_en' );
        $inserted->save();
        return redirect()->action('Admin\CityStateController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delCityState($id)
    {
        CityState::where('id', $id)->delete();
        return redirect()->action('Admin\CityStateController@index');
    }
}
