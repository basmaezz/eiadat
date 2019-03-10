<?php

namespace App\Http\Controllers\Site;

use App\DoctorProcess;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcessesController  extends Controller {

    public function index($id) {

    }


    public function create() {

    }


    public function store(Request $request) {
        $data = $this->validate(request(),[
            'name'=>'required',
        ],[],[
            'name'=>'اسم العمليه'
        ]);
        $data['doctorId'] = auth()->guard('users-web')->user()->id;
        DoctorProcess::create($data);

        return back();
    }


    public function show($id) {

        return view('site.user.doctorProcesses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id) {
//        $editData = DoctorAnalyzes::where('id', $id)->first();
//        return view('site.user.editdrug')->with(['editData' => $editData]);
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $docprocess = new DoctorProcess();
        $docprocess->id = $request->input('process_id');
        $docprocess->doctorId = $request->input('doctor_id');
        $docprocess->name = $request->input('name');
        $docprocess->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        DoctorProcess::where('doctorId',auth()->guard('users-web')->user()->id)->where('id',$id)->delete();
        return redirect()->back();
    }
}
