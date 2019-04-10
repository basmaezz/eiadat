<?php

namespace App\Http\Controllers\Site;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\UserWeb;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Lang;
use App\Doctors;
use App\Cateory;
use App\Specialization;
use App\City;
use App\CityState;
use App\CityQuarter;



class UserController extends Controller
{
    public function __construct()
    {
        $userData = UserWeb::find(session('userId'));
        view()->share([
            'userData' => $userData,

        ]);
    }

    public function signIn()
    {
        return view('site.web.signIn');
    }



    public function signUp()
    {
        return view('site.web.signUp');
    }



    public function doctorDashboard()
    {
        return view('site.user.doctorDashboard');
    }

    public function doctorProfile()
    {
        return view('site.user.doctorProfile');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users-web',
            'phone' => 'required',
            'password' => 'required',
        ]);
        $user =   new UserWeb();
        $user->name = $request->input('name' );
        $user->phone = $request->input('phone' );
        $user->email = $request->input('email' );
        $user->password = bcrypt($request->password);
        $user->type= $request->input('type');
        $user->save();
    }


    public function login(Request $request)
    {
        if(Auth::guard('users-web')->check())
        {

            return view('site.user.doctorDashboard');
        }
//         Validate the form data
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);
//return Auth::user();
//        dd($request->name,$request->password);
//        dd(Auth::guard('users-web')->attempt(['name' => $request->name, 'password' => $request->password], $request->get('remember')));
        if (Auth::guard('users-web')->attempt(['name' => $request->name, 'password' => $request->password], false))
        {
            if(Auth::guard('users-web')->user()->type == 1){
//                return redirect()->route('userprofile');
                return view('site.user.doctorDashboard');

            }
            elseif (Auth::guard('users-web')->user()->type==2)
            {

//                return view('site.user.doctorDashboard');
            }
        }

        return 'Error';
    }



//    public function login(Request $request)
//    {
//        $this->validate($request, [
//            'name'   => 'required',
//            'password' => 'required'
//        ]);
//
//        if (Auth::guard('users-web')->attempt(['name' => $request->name, 'password' => $request->password], $request->get('remember'))) {
//
//            return view('site.user.doctorDashboard');
//        }
//        dd("error");
//    }


    public function profile($id){


        $editData = UserWeb::find($id);
        $docData = Doctors::where('userId' , $id)->first();
//        dd($docData);

        $allCity = City::all();

//    return  $docData;
//        $allCity = City::all();
//        return  $docData;

        return view('site.user.doctorProfile',[
            'editData'=> $editData  ,
            'docData'=>$docData
        ]);

    }

    public function show($id){


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

        return  view('site.user.editdoctorprofile')->with([ 'editData'=> $editData  ,
            'detailsData'=> $detailsData ,'allSpecail' => $allSpecail , 'allTitle' => $allTitle,
            'allCity' => $allCity , 'allState' => $allState , 'allQ' => $allQ]);

    }

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
//        dd($details);
        return redirect()->action('Site\UserController@profile',['id'=>Auth::guard('users-web')->user()->id]);
    }

    public function userlogout(Request $request)
    {
        Auth::guard('users-web')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->action('Site\UserController@signIn');
//        Auth::guard('users-web')::logout();
//        echo "test";
//        return redirect()->route('signIn');
//       return redirect()->route('signIn');
//        return redirect()->route( 'admin.login' );
//        $this->signIn();
    }



}

