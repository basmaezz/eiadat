<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            //
            $lang = Language::all();
            return view('admin.lang.index')->with('lang', $lang);
        } else {
            return redirect()->route('login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()) {
            return view('admin.lang.create');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::user()) {
            $this->validate($request, [
                'name' => 'required',
                'symbol' => 'required',
            ]);

            if ($request->hasFile('flag')) {
                //
                $flag = time() . '.' . $request->file('flag')->getClientOriginalExtension();
                $request->file('flag')->move(public_path('images'), $flag);
            } else {
                $flag = '';
            }
            $lagn =  new Language();
            $lagn->flag = $flag;
            $lagn->name = $request->input('name' );
            $lagn->symbol = $request->input('symbol' );
            $lagn->save();
            return redirect()->action('Admin\LanguageController@index');
        } else {
            return redirect()->route('login');
        }
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
        if (Auth::user()) {
            $lang = Language::find($id);
            return  view('admin.lang.edit')->with('lang', $lang);
        } else {
            return redirect()->route('login');
        }
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
        if (Auth::user()) {
            $this->validate($request, [
                'name' => 'required',
                'symbol' => 'required',
            ]);
            if ($request->hasFile('flag')) {
                //
                $flag = time() . '.' . $request->file('flag')->getClientOriginalExtension();
                $request->file('flag')->move(public_path('images'), $flag);
            } else {
                $flag = $request->input('oldImage' );
            }


            $lagn = Language::find($id);
            $lagn->flag = $flag;
            $lagn->name = $request->input('name' );
            $lagn->symbol = $request->input('symbol' );
            $lagn->save();

            // Language::find($id)->update($request->all());
            return redirect()->action('Admin\LanguageController@index');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyLang($id)
    {

        DB::table('languages')->where('id', '=', $id)->delete();
        return redirect()->action('Admin\LanguageController@index');
    }

}
