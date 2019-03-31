<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;
use App\PatientHistroy;
use App\UserWeb;
use App\City;
use Auth;
use App\CityState;
use App\CityQuarter;
use App\Patient;
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
    public function index($id)
    {
        $patients= UserWeb::where('doctorId',$id)->paginate(5);
//        dd($patients);
        return view('site.user.doctorPatients')->with(['patients' => $patients]);
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
        return view('site.user.addpatient')->with(['allData' => $allData, 'allCity' => $allCity]);
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
            'name' => 'required',
            'phone' => 'required|numeric|unique:users-web',
            'password' => 'required',
        ]);
        $insert = new UserWeb();
        $insert->type = 2;
        $insert->name = $request->input('name');
        $insert->email = $request->input('email');
        $insert->password =  Hash::make($request->input('password'));
        $insert->phone = $request->input('phone');
        $insert->serialNo = Helper::randomString();
        $insert->cityId = $request->input('cityId');
        $insert->stateId = $request->input('stateId');
        $insert->quarterId = $request->input('quarterId');
        $insert->gender = $request->input('gender');
        $insert->age = $request->input('age');
        if(auth('users-web')->check()){
            $insert->doctorId = auth('users-web')->user()->id;
        }
        $insert->save();
        return redirect()->action('Admin\PatientController@index',['id'=>auth('users-web')->user()->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //$patients = UserWeb::whereIN('id', 'SELECT patientId FROM patient_histroys WHERE doctorId = ' . $id)->paginate(1);
        $patienthistory = PatientHistroy::where('doctorId', '=', $id)->with('patient')->paginate(5);

        return view('site.user.doctorPatients')->with(['patienthistory' => $patienthistory]);
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
              "email"=> "required|email",
              "phone"=> "required|numeric",
              "age"=> "numeric"
        ];
       $data = $this->validate(request(),$rules,[],[
            "name"=>"name",
            "email"=>"email",
            "phone"=>"phone",
            "age"=>"Age",
        ]);
//       dd($data);
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

        UserWeb ::where('id',$id)->delete();
//        UserWeb ::where('doctorId',auth()->guard('users-web')->user()->id)->delete();
        return redirect()->back();
    }

    public function history($id){

        $patientdata= UserWeb::find($id);
//        dd($patientdata->count());

        $patienthistory=PatientHistroy::where('PatientId',$id)->paginate(2);
//        dd($patienthistory);

        return view('site.user.patienthistory')->with([ 'patientdata' => $patientdata ,
            'patienthistory'=> $patienthistory ]);
    }



    public function addhistory($id){

        $patientdata= UserWeb::find($id);
//        dd($id);
        $drugs = Drugs::all();
        $Analyzes = DoctorAnalyzes::all();
        $Process = DoctorProcess::all();
        $Radiation = DoctorRadiation::all();

        return view('site.user.addhistory')->with(['patientdata'=>$patientdata,'drugs' => $drugs ,  'Analyzes' => $Analyzes ,
            'Process' => $Process  , 'Radiation' => $Radiation, 'id' => $id]);
//        dd($id);

    }



    public function storehistory( Request $request, $id){
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
        dd($inserted);
        return redirect()->action('Site\PatientController@history' , $request->input('patientId' ));
//        return redirect()->back();

    }

}
