<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use Auth;
use App\UserWeb;
use App\City;
use App\CityState;
use App\CityQuarter;
use App\Patient;
use App\PatientHistroy;
use App\Drugs;
use App\DoctorAnalyzes;
use App\DoctorProcess;
use App\DoctorRadiation;
use App\DoctorDiseases;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allData = UserWeb::where('type', 2)->paginate(15);
        $allCity = City::all();
        $allCityState = CityState::all();
        $allCityQuarter = CityQuarter::all();
        $allPatientHistroy = PatientHistroy::all();
        $allDiseases = DoctorDiseases::all();
        return view('admin.patient.index')->with(['allData' => $allData, 'allCity' => $allCity, 'allCityState' => $allCityState,
            'allCityQuarter' => $allCityQuarter, 'allPatientHistroy' => $allPatientHistroy, 'allDiseases' => $allDiseases]);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allData = UserWeb::all();
        $allCity = City::all();
        return view('admin.patient.create')->with(['allData' => $allData, 'allCity' => $allCity]);

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
            'name' => 'required',
            'phone' => 'required|numeric|unique:users-web',
            'password' => 'required',
        ]);
        $insert = new UserWeb();
        $insert->type = 2;
        $insert->name = $request->input('name');
        $insert->email = $request->input('email');
        $insert->password = md5($request->input('password'));
        $insert->phone = $request->input('phone');
        $insert->serialNo = Helper::randomString();
        $insert->cityId = $request->input('cityId');
        $insert->stateId = $request->input('stateId');
        $insert->quarterId = $request->input('quarterId');
        $insert->gender = $request->input('gender');
        $insert->age = $request->input('age');
        $insert->save();
        return redirect()->action('Admin\PatientController@index');

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
        $editData = UserWeb::find($id);
        $allCity = City::all();
        $allState = CityState::where('cityId', $editData->cityId)->get();
        $allQ = CityQuarter::where('stateId', $editData->stateId)->get();
        return view('admin.patient.edit')->with(['editData' => $editData, 'allCity' => $allCity,
            'allState' => $allState, 'allQ' => $allQ]);

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
            'name' => 'required',
            'phone' => 'required',
        ]);
        $insert = UserWeb::find($id);
        $insert->type = 2;
        $insert->name = $request->input('name');
        $insert->email = $request->input('email');
        if (empty($request->input('password'))) {
            $pass = $request->oldPassword;
        } else {
            $pass = md5($request->input('password'));
        }
        $insert->password = $pass;
        $insert->phone = $request->input('phone');
        $insert->cityId = $request->input('cityId');
        $insert->stateId = $request->input('stateId');
        $insert->quarterId = $request->input('quarterId');
        $insert->gender = $request->input('gender');
        $insert->age = $request->input('age');
        $insert->save();
        return redirect()->action('Admin\PatientController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function delUser($id)
    {
        UserWeb::where('id', $id)->delete();
        return redirect()->action('Admin\PatientController@index');
    }


    public function history($id)
    {
        $historyData = PatientHistroy::where('patientId', $id)->get();
        foreach ($historyData as $data) {
            $uData = UserWeb::find($data->doctorId);
            $data->doctorName = $uData->name;
        }
        return view('admin.patient.history')->with(['historyData' => $historyData, 'patientId' => $id]);
    }




    public function advancedSearch()
    {
        $allCity = City::all();
        $allCityState = CityState::all();
        $allCityQuarter = CityQuarter::all();
        //
        $allDrug = Drugs::all();
        $allAnalyzes = DoctorAnalyzes::all();
        $allProcess = DoctorProcess::all();
        $allRadiation = DoctorRadiation::all();
        //

        $allPatientHistroy = PatientHistroy::all();
        $allDiseases = DoctorDiseases::all();

        return view('admin.patient.advancedSearch')->with(['allCity' => $allCity,
            'allCityState' => $allCityState, 'allCityQuarter' => $allCityQuarter,
            'allDrug' => $allDrug, 'allAnalyzes' => $allAnalyzes,
            'allProcess' => $allProcess, 'allRadiation' => $allRadiation,
            'allPatientHistroy' => $allPatientHistroy, 'allDiseases' => $allDiseases]);


    }


    public function patientSearch(Request $request)
    {
        //
        $builder = UserWeb::where('type', 2);   //query();  //DB()
       
        //$builder->where('type', 2);

        if (!empty($request->input('patientName'))) {
            $builder->where('name', 'like', $request->input('patientName'));
        }
        
        
          /*  if (!empty($request->input('gender')))
         {
             $builder->where('gender',$request->input('gender'));
         }
          
      
     
         if (!empty($request->input('cityId')))
         {
             $builder->where('cityId',$request->input('cityId'));
         }
         
         if (!empty($request->input('stateId')))
         {
             $builder->where('stateId',$request->input('stateId'));
         }
         
         
         if (!empty($request->input('quarterId')))
         {
             $builder->where('quarterId',$request->input('quarterId'));
         }
         
          if (!empty($request->input('age')))
         {
             $builder->where('age',$request->input('age'));
         }
         
         
         
         if (!empty($request->input('gender')))
         {
             $builder->where('gender',$request->input('gender'));
         }
*/
        
      // dd($builder);

        //dd($request->input('gender'));

        $allData = $builder->orderBy('id')->paginate(10);
        $allCity = City::all();
        $allCityState = CityState::all();
        $allCityQuarter = CityQuarter::all();
        $allPatientHistroy = PatientHistroy::all();
        $allDiseases = DoctorDiseases::all();


       
        return view('admin.patient.index')->with(['allData' => $allData, 'allCity' => $allCity, 'allCityState' => $allCityState, 'allCityQuarter' => $allCityQuarter,
            'allPatientHistroy' => $allPatientHistroy, 'allDiseases' => $allDiseases
        ]);


    }



}
