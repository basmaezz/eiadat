<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use App\UserWeb;
use App\Doctors;
use App\Cateory;
use App\Specialization;
use App\City;
use App\CityState;
use App\CityQuarter;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allData = UserWeb::where('type' , 1)->paginate(15);
//        dd($allData);
        return view('admin.doctor.index')->with('allData', $allData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $allSpecail = Cateory::all();
        foreach ($allSpecail as $data)
        {
            $nameArr = json_decode($data->name , true);
            $data->name = $nameArr[Lang::getLocale()];

        }
        $allTitle = Specialization::all();
        foreach ($allTitle as $data)
        {
            $nameArr = json_decode($data->name , true);
            $data->name = $nameArr[Lang::getLocale()];

        }
        $allCity = City::all();
        return view('admin.doctor.create')->with([ 'allSpecail' => $allSpecail , 'allTitle' => $allTitle,
            'allCity' => $allCity,]);
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
            'phone' => 'required|unique:users-web',
            'password' => 'required',
        ]);
        //inserted main data
        $inserted =  new UserWeb();
        $inserted->type = 1;
        $inserted->serialNo = Helper::randomString();
        $inserted->groupId = 2;
        $inserted->isActive = 1;
        $inserted->name = $request->input('name' );
        $inserted->email = $request->input('email' );
        $inserted->phone = $request->input('phone' );
        $inserted->password = md5($request->input('password'));
        $inserted->cityId = $request->input('cityId' );
        $inserted->stateId = $request->input('stateId' );
        $inserted->quarterId = $request->input('quarterId' );
        $inserted->gender = $request->input('gender' );
        $inserted->save();
        //insert details
        $details = new Doctors();
        $details->userId = $inserted->id;
        $details->discount = $request->input('discount' );
        $details->specialId = $request->input('specialId' );
        $details->titleId = $request->input('titleId' );
        $details->countryId = $request->input('cityId' );
        $details->address = $request->input('address' );
        $details->hotline = $request->input('hotline' );
        $details->price = $request->input('price' );
        $details->about = $request->input('about' );
        $details->clinicTime = $request->input('clinicTime' );
        $details->doctorService = $request->input('doctorService' );
        $details->clinicService = $request->input('clinicService' );
        if ($request->hasFile('doctorImage')) {
            //
            $imageName = time() . '.' . $request->file('doctorImage')->getClientOriginalExtension();
            $request->file('doctorImage')->move(public_path('images'), $imageName);
        } else {
            $imageName = '';
        }
        $details->doctorImage = $imageName;
        if ($request->hasFile('clinicImage')) {
            //
            $clinicImage = time() . '.' . $request->file('clinicImage')->getClientOriginalExtension();
            $request->file('clinicImage')->move(public_path('images'), $clinicImage);
        } else {
            $clinicImage = '';
        }
        $details->clinicImage = $clinicImage;
        $details->save();
        return redirect()->action('Admin\DoctorController@index');
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
        //
        $allSpecail = Cateory::all();
        foreach ($allSpecail as $data)
        {
            $nameArr = json_decode($data->name , true);
            $data->name = $nameArr[Lang::getLocale()];

        }
        $allTitle = Specialization::all();
        foreach ($allTitle as $data)
        {
            $nameArr = json_decode($data->name , true);
            $data->name = $nameArr[Lang::getLocale()];

        }

        $editData = UserWeb::find($id);
        $detailsData = Doctors::where('userId' , $id)->first();

        $allCity = City::all();
        $allState = CityState::where('cityId' , $editData->cityId)->get();
        $allQ = CityQuarter::where('stateId' ,$editData->stateId )->get();

        return  view('admin.doctor.edit')->with([ 'editData'=> $editData  ,
            'detailsData'=> $detailsData ,'allSpecail' => $allSpecail , 'allTitle' => $allTitle,
            'allCity' => $allCity , 'allState' => $allState , 'allQ' => $allQ]);
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
            'name' => 'required',
            'phone' => 'required',

        ]);
        //inserted main data
        $inserted =  UserWeb::find($id);
        $inserted->type = 1;
        $inserted->groupId = 2;
        $inserted->isActive = 1;
        $inserted->name = $request->input('name' );
        $inserted->email = $request->input('email' );
        $inserted->phone = $request->input('phone' );
        if (empty($request->input('password')))
        {
            $pass = $request->oldPassword;
        }
        else{
            $pass = md5($request->input('password'));
        }
        $inserted->password = $pass;
        $inserted->cityId = $request->input('cityId' );
        $inserted->stateId = $request->input('stateId' );
        $inserted->quarterId = $request->input('quarterId' );
        $inserted->gender = $request->input('gender' );
        $inserted->save();
        //insert details
        $details =  Doctors::where('userId' , $id)->first();
        $details->userId = $inserted->id;
        $details->discount = $request->input('discount' );
        $details->specialId = $request->input('specialId' );
        $details->titleId = $request->input('titleId' );
        $details->countryId = $request->input('cityId' );
        $details->address = $request->input('address' );
        $details->hotline = $request->input('hotline' );
        $details->price = $request->input('price' );
        $details->about = $request->input('about' );
        $details->clinicTime = $request->input('clinicTime' );
        $details->doctorService = $request->input('doctorService' );
        $details->clinicService = $request->input('clinicService' );
        if ($request->hasFile('doctorImage')) {
            //
            $imageName = time() . '.' . $request->file('doctorImage')->getClientOriginalExtension();
            $request->file('doctorImage')->move(public_path('images'), $imageName);
        } else {
            $imageName = $request->oldDoctorImage ;
        }
        $details->doctorImage = $imageName;
        if ($request->hasFile('clinicImage')) {
            //
            $clinicImage = time() . '.' . $request->file('clinicImage')->getClientOriginalExtension();
            $request->file('clinicImage')->move(public_path('images'), $clinicImage);
        } else {
            $clinicImage = $request->oldClinicImage ;
        }
        $details->clinicImage = $clinicImage;
        $details->save();
        return redirect()->action('Admin\DoctorController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delDoctor($id)
    {
        //
        UserWeb::where('id' ,$id)->delete();
        Doctors::where('userId' , $id)->delete();
        return redirect()->action('Admin\DoctorController@index');

    }
}
