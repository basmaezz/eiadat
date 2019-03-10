<?php

namespace App\Http\Controllers\Site;

use App\DoctorRadiation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RadiationsController extends Controller {

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
        DoctorRadiation::create($data);

        return back();
    }


    public function show($id) {

        return view('site.user.DoctorRadiations');
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
        $radiation = new DoctorRadiation();
        $radiation->id = $request->input('analyze_id');
        $radiation->doctorId = $request->input('doctor_id');
        $radiation->name = $request->input('name');
        $radiation->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        DoctorRadiation::where('doctorId',auth()->guard('users-web')->user()->id)->where('id',$id)->delete();
        return redirect()->back();
    }
}
