<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\UserWeb;
use App\DoctorProcess;
use App\ProcessList;

class ProcessListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allData = ProcessList::where('type' , 1)->get();
        foreach($allData as $data)
        {
            if($data->processDate < date('Y-m-d'))
            {
                ProcessList::where('id', $data->id)->update(['status' => 2]);
            }
        }
        return view('admin.processList.index')->with('allData', $allData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allDoctor = UserWeb::where('type', 1)->get();
        $allPatient = UserWeb::where('type', 2)->get();
        $allProcess = DoctorProcess::all();
        return view('admin.processList.create')->with([
            'allDoctor' => $allDoctor ,
            'allPatient' => $allPatient,
            'allProcess' => $allProcess,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'doctorId' => 'required',
            'patientId' => 'required',
            'processId' => 'required',
            'processDate' => 'required',
        ]);
        //inserted
        $inserted =  new ProcessList();
        $inserted->type = 1;
        $inserted->doctorId = $request->input('doctorId' );
        $inserted->patientId = $request->input('patientId' );
        $inserted->processId = $request->input('processId' );
        $inserted->processDate = $request->input('processDate' );
        $inserted->state = $request->input('state' );
        $inserted->report = $request->input('report' );
         if ($request->hasFile('reportImg')) {
                //
                $imageName = time() . '.' . $request->file('reportImg')->getClientOriginalExtension();
                $request->file('reportImg')->move(public_path('images'), $imageName);
            } else {
                $imageName = '';
            }
        $inserted->reportImg =   $imageName;
        $inserted->save();
        return redirect()->action('Admin\ProcessListController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = ProcessList::find($id);
        $allDoctor = UserWeb::where('type', 1)->get();
        $allPatient = UserWeb::where('type', 2)->get();
        $allProcess = DoctorProcess::all();
        return  view('admin.processList.edit')->with([
            'editData'=> $editData,
            'allDoctor' => $allDoctor ,
            'allPatient' => $allPatient,
            'allProcess' => $allProcess,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'doctorId' => 'required',
            'patientId' => 'required',
            'processId' => 'required',
            'processDate' => 'required',
        ]);
        //inserted
        $inserted =   ProcessList::find($id);
         $inserted->type = 1;
        $inserted->doctorId = $request->input('doctorId' );
        $inserted->patientId = $request->input('patientId' );
        $inserted->processId = $request->input('processId' );
        $inserted->processDate = $request->input('processDate' );
        $inserted->state = $request->input('state' );
         $inserted->report = $request->input('report' );
         if ($request->hasFile('reportImg')) {
                //
                $imageName = time() . '.' . $request->file('reportImg')->getClientOriginalExtension();
                $request->file('reportImg')->move(public_path('images'), $imageName);
            } else {
                $imageName = '';
            }
        $inserted->reportImg =   $imageName;
        $inserted->save();
        return redirect()->action('Admin\ProcessListController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delprocessList($id)
    {
        ProcessList::where('id', $id)->delete();
        return redirect()->action('Admin\ProcessListController@index');
    }
    
    
    public function finishedList()
    {
        //
        $allData = ProcessList::where('type' , 2)->where('processDate' , '<' , date("Y-m-d"))->get();
        return view('admin.processList.index')->with('allData', $allData);
    }



}
