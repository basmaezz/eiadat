<?php

namespace App\Http\Controllers\Site;

use App\Drugs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DrugsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $this->validate(request(),[
            'name'=>'required',
        ],[],[
            'name'=>'اسم الدواء'
        ]);
        $data['doctorId'] = auth()->guard('users-web')->user()->id;
        Drugs::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        return view('site.user.doctorDrugs');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $editData = Drugs::where('id', $id)->first();
        return view('site.user.editdrug')->with(['editData' => $editData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $drug = new Drugs();
        $drug->id = $request->input('drug_id');
        $drug->doctorId = $request->input('doctor_id');
        $drug->name = $request->input('name');
        $drug->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Drugs::where('doctorId',auth()->guard('users-web')->user()->id)->where('id',$id)->delete();
        return redirect()->back();
    }
}
