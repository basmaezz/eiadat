<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\City;
use App\CityState;
use App\CityQuarter;

class CityQuarterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allData = CityQuarter::all();
        return view('admin.cityQuarter.index')->with('allData', $allData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCity = City::all();
        return view('admin.cityQuarter.create')->with(['allCity' => $allCity]);
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
        $inserted =  new CityQuarter();
        $inserted->cityId = $request->input('cityId' );
        $inserted->stateId = $request->input('stateId' );
        $inserted->name_ar = $request->input('name_ar' );
        $inserted->name_en = $request->input('name_en' );
        $inserted->save();
        return redirect()->action('Admin\CityQuarterController@index');
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
        $editData = CityQuarter::find($id);
        $allCity = City::all();
        $allSub = CityState::where('cityId' , $editData->cityId)->get();
        return  view('admin.cityQuarter.edit')->with(['editData'=> $editData  , 'allCity'=> $allCity ,
            'allSub' => $allSub]);
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
        $inserted =  CityQuarter::find($id);
        $inserted->cityId = $request->input('cityId' );
        $inserted->stateId = $request->input('stateId' );
        $inserted->name_ar = $request->input('name_ar' );
        $inserted->name_en = $request->input('name_en' );
        $inserted->save();
        return redirect()->action('Admin\CityQuarterController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delCityQuarter($id)
    {
        CityQuarter::where('id', $id)->delete();
        return redirect()->action('Admin\CityQuarterController@index');
    }
}
