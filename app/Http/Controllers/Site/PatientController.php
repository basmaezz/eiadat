<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PatientHistroy;
use App\UserWeb;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        // $id= UserWeb::find($id);
        // $docId= UserWeb -> id() ;
        // dd($id);
//        $patients = PatientHistroy::where('doctorId', $id);
//        dd($patients);
//        $users= UserWeb::get();
//        $patientsdata= $users->patients();
//        dd($patientsdata);

        return view('site.user.doctorPatients');



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patientdata= UserWeb::find($id);
        $patienthistory=PatientHistroy::where('PatientId',$id)->first();
//        dd($patienthistory);

        return view('site.user.patienthistory')->with([ 'patientdata' => $patientdata ,
            'patienthistory'=> $patienthistory ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function updatepatient(Request $request, $id) {
        $rules = [
              "name"=> "required",
              "email"=> "required|email|unique:users-web,email,".$id,
              "phone"=> "required|numeric",
              "age"=> "required|numeric"
        ];
       $data = $this->validate(request(),$rules,[],[
            "name"=>"name",
            "email"=>"email",
            "phone"=>"phone",
            "age"=>"Age",
        ]);
        session()->flash('success','تم تحديث البيانات بنجاح');

        UserWeb::where('id',$id)->update($data);

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PatientHistroy ::where('doctorId',auth()->guard('users-web')->user()->id)->where('patientId',$id)->delete();
        return redirect()->back();
    }

    public function history($id){

        $patientdata= UserWeb::find($id);
//        dd($patientdata);

        $patienthistory=PatientHistroy::where('PatientId',$id)->first();
//        dd($patienthistory);

        return view('site.user.patienthistory')->with([ 'patientdata' => $patientdata ,
            'patienthistory'=> $patienthistory ]);
    }




}
