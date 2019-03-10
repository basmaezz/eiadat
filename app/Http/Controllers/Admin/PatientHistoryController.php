<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\UserWeb;
use App\Drugs;
use App\DoctorAnalyzes;
use App\DoctorProcess;
use App\DoctorRadiation;
use App\PatientHistroy;

class PatientHistoryController extends Controller
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
        $this->validate($request, [
            'doctorId' => 'required',
            'disease' => 'required',
        ]);
        //inserted
        $inserted =  new PatientHistroy();
        $inserted->patientId = $request->input('patientId' );
        $inserted->doctorId = $request->input('doctorId' );
        $inserted->disease = $request->input('disease' );
        $inserted->complicationsDisease = $request->input('complicationsDisease' );
    
     if(!empty($request->input('analyzes' ))){
         $inserted->analyzes = implode(',' , $request->input('analyzes' ) );
     }
     
     if(!empty($request->input('processes' ))){
        $inserted->processes = implode(',' , $request->input('processes' ) );
     }
     
     if(!empty($request->input('radiation' ))){
         $inserted->radiation = implode(',' , $request->input('radiation' ) );
     }
     
     if(!empty($request->input('drugs' ))){
        $inserted->drugs = implode(',' , $request->input('drugs' ) );
     }
     
     if(!empty($request->input('analyzesImg' ))){
        $inserted->analyzesImg = implode(',' , $request->input('analyzesImg' ) );
     }
     
     
     if(!empty($request->input('radiationImg' ))){
        $inserted->radiationImg = implode(',' , $request->input('radiationImg' ) );
     }
    
        $inserted->save();
        return redirect()->action('Admin\PatientController@history' , $request->input('patientId' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allDoctors = UserWeb::where('type' , 1)->get();
        $drugs = Drugs::all();
        $Analyzes = DoctorAnalyzes::all();
        $Process = DoctorProcess::all();
        $Radiation = DoctorRadiation::all();
        
        return view('admin.patientHistory.create')->with(['allDoctors' => $allDoctors ,
            'drugs' => $drugs ,  'Analyzes' => $Analyzes , 'Process' => $Process  , 'Radiation' => $Radiation  , 'id' => $id]);
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
