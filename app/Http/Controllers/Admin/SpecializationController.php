<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use App\Language;
use App\Specialization;


class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allData = Specialization::all();
        foreach ($allData as $data)
        {
            $nameArr = json_decode($data->name , true);
            $data->name = $nameArr[Lang::getLocale()];

        }
        return view('admin.special.index')->with('allData', $allData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allLang = Language::all();
        return view('admin.special.create')->with('allLang', $allLang);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allLang = Language::all();
        foreach ($allLang as $data) {
            $names[$data->symbol] = $request->input('name_' . $data->symbol);
        }
        $nameArr = json_encode($names);
        //Insert
        $insert = new Specialization();
        $insert->name = $nameArr;
        $insert->save();
        //
        return redirect()->action('Admin\SpecializationController@index');
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
        $allLang = Language::all();
        $editData = Specialization::find($id);
        $nameArr = json_decode($editData->name , true);
        $editData->name = $nameArr[Lang::getLocale()];
        return view('admin.special.edit')->with(['editData'=> $editData ,'nameArr' => $nameArr , 'allLang' => $allLang]);
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
        $allLang = Language::all();
        foreach ($allLang as $data) {
            $names[$data->symbol] = $request->input('name_' . $data->symbol);
        }
        $nameArr = json_encode($names);
        //update
        $main =  Specialization::find($id);
        $main->name = $nameArr;
        $main->save();
        //
        return redirect()->action('Admin\SpecializationController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSpecial($id)
    {
        Specialization::where('id' , $id)->delete();
        return redirect()->action('Admin\SpecializationController@index');
    }
}
