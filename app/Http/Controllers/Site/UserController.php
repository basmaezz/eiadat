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
//         Validate the form data
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('users-web')->attempt(['name' => $request->name, 'password' => $request->password], $request->remember)) {

            if(Auth::guard('users-web')->user()->type=1){
//                return redirect()->route('userprofile');
                return view('site.user.doctorDashboard');

            }elseif (Auth::guard('users-web')->user()->type=2){

//                return view('site.user.doctorDashboard');
            }
        }

        return 'Error';
    }

    public function profile($id){


        $editData = UserWeb::find($id);
        $docData = Doctors::where('userId' , $id)->first();

        $allCity = City::all();

    //return  $docData;

        return view('site.user.doctorProfile',[
            'editData'=> $editData  ,
            'docData'=>$docData
        ]);

    }

    public function logout()
    {
//        Auth::guard('users-web')::logout();
//        return redirect()->route('signIn');

        Auth::logout();
        return redirect()->route('signIn');

    }



}

