<?php

namespace App\Http\Controllers\Site;

use App\DoctorAnalyzes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyzesController extends Controller {

    public function index($id) {

    }


    public function create() {

    }


    public function store(Request $request) {
        $data = $this->validate(request(),[
            'name'=>'required',
        ],[],[
            'name'=>'اسم الأشعه'
        ]);
        $data['doctorId'] = auth()->guard('users-web')->user()->id;
        DoctorAnalyzes::create($data);

        return back();
    }


    public function show($id) {

        return view('site.user.doctorAnalyzes');
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
        $analyze = new DoctorAnalyzes();
        $analyze->id = $request->input('analyze_id');
        $analyze->doctorId = $request->input('doctor_id');
        $analyze->name = $request->input('name');
        $analyze->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        DoctorAnalyzes::where('doctorId',auth()->guard('users-web')->user()->id)->where('id',$id)->delete();
        return redirect()->back();
    }
}
