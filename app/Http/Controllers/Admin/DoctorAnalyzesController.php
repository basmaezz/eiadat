<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\DoctorAnalyzes;
use App\UserWeb;

class DoctorAnalyzesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $editData = DoctorAnalyzes::where('doctorId' , $id)->get();

        $allDocotr = UserWeb::where('type' , 1)->get();
        return  view('admin.doctorAnalysis.edit')->with([ 'editData' => $editData ,
            'allDocotr'=> $allDocotr , 'doctorId' => $id]);
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
            'doctorId' => 'required',
        ]);
        //update
        $count = $request->input('name');
        for ($x = 0; $x < count($count); $x++) {

            if (!empty($request->input('id')[$x])) {

                $update  = DoctorAnalyzes::find($request->input('id')[$x]);
                $update->doctorId = $request->input('doctorId');
                $update->name = $request->input('name')[$x];
                $update->save();
            }
            elseif (empty($request->input('id')[$x])) {

                $insert  = new DoctorAnalyzes();
                $insert->doctorId = $request->input('doctorId');
                $insert->name = $request->input('name')[$x];
                $insert->save();

            }
        }

        return redirect()->action('Admin\DoctorController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAn($id)
    {
        DoctorAnalyzes::where('id' , $id)->get();
        return redirect()->back();
    }
}
