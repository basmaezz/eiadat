<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Language;
use App\ContactUs;
use App\Subscrib;
use App\Apply;


class MessageController extends Controller
{
    //
    public function contactUs()
    {
        //
        if (Auth::user()) {
            //
            $allData = ContactUs::all();
            return view('admin.message.contactUs')->with('allData', $allData);
        } else {
            return redirect()->route('login');
        }
    }

    //
    public function subscribe()
    {
        //
        if (Auth::user()) {
            //
            $allData = Subscrib::all();
            return view('admin.message.subscribe')->with('allData', $allData);
        } else {
            return redirect()->route('login');
        }
    }

    public function deletesubscribe($id)
    {
        DB::table('subscribs')->where('id', '=', $id)->delete();
        return back();
    }

    public function ApplyNow()
    {
        //
        if (Auth::user()) {
            //
            $allData = Apply::all();
            return view('admin.message.apply')->with('allData', $allData);
        } else {
            return redirect()->route('login');
        }
    }
}
