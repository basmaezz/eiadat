<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use App\UserWeb;
use App\UserDetails;
use App\Reservations;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allData = Reservations::all();
        foreach ($allData as $data)
        {
            $doctorData = UserWeb::find($data->doctorId);
            $data->doctorName = $doctorData->name;

            $pData = UserWeb::find($data->patientId);
            $data->pName = $pData->name;
        }
        return view('admin.reservation.index')->with('allData', $allData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allDocotr = UserWeb::where('type' , 1)->get();
        $allPatient = UserWeb::where('type' , 2)->get();
        return view('admin.reservation.create')->with([ 'allDocotr'=> $allDocotr , 'allPatient'=> $allPatient]);
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
            'reservDate' => 'required',
        ]);
        //inserted
        $inserted =  new Reservations();
        $inserted->doctorId = $request->input('doctorId' );
        $inserted->patientId = $request->input('patientId' );
        $inserted->type = $request->input('type' );
        $inserted->reservDate = $request->input('reservDate' );
        $inserted->addedBy = 1;
        $inserted->save();
        return redirect()->action('Admin\ReservationsController@index');
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
        $allDocotr = UserWeb::where('type' , 1)->get();
        $allPatient = UserWeb::where('type' , 2)->get();
        $editData = Reservations::find($id);
        return  view('admin.reservation.edit')->with(['editData'=> $editData ,'allDocotr'=> $allDocotr , 'allPatient'=> $allPatient]);
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
            'reservDate' => 'required',
        ]);
        //inserted
        $inserted =  Reservations::find($id);
        $inserted->doctorId = $request->input('doctorId' );
        $inserted->patientId = $request->input('patientId' );
        $inserted->type = $request->input('type' );
        $inserted->reservDate = $request->input('reservDate' );
        $inserted->addedBy = 1;
        $inserted->save();
        return redirect()->action('Admin\ReservationsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delReservations($id)
    {
        Reservations::where('id' , $id)->delete();
        return redirect()->action('Admin\ReservationsController@index');
    }
}
