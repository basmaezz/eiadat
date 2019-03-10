<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Setting;
use App\Social;
use Illuminate\Support\Facades\App;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeLang($lang)
    {
        Session(['locale' => $lang]);
        return redirect()->back();
    }


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        if (Auth::user()) {
            $setting = Setting::find(1);
            $social = Social::all();
            return view('admin.setting.edit')->with(['setting'=> $setting , 'social' => $social]);
        } else {
            return redirect()->route('login');
        }
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
        if (Auth::user()) {


            $this->validate($request, [
                'siteName' => 'required',
                'phone' => 'required',
                'email' => 'required',
            ]);

            if ($request->hasFile('imageName')) {
                //
                $imageName = time() . '.' . $request->file('imageName')->getClientOriginalExtension();
                $request->file('imageName')->move(public_path('images'), $imageName);
            } else {
                $imageName = $_POST['oldImage'];
            }


            $setting = Setting::find(1);
            $setting->logo = $imageName;
            $setting->brochure = '';
            $setting->siteName = $request->input('siteName');
            $setting->email = $request->input('email');
            $setting->phone = $request->input('phone');
            $setting->address = $request->input('address');
            $setting->addressEn = '';
            $setting->save();

            //update Social
            $itr2 = $request->input('name');
            for ($x = 0; $x < count($itr2); $x++) {

                if (!empty($request->input('id')[$x])) {


                    $social  = Social::find($request->input('id')[$x]);
                    $social->name = $request->input('name')[$x];
                    $social->icon = $request->input('icon')[$x];
                    $social->link = $request->input('link')[$x];
                    $social->save();
                }
                elseif (empty($request->input('id')[$x])) {

                    $social = new Social();
                    $social->name = $request->input('name')[$x];
                    $social->icon = $request->input('icon')[$x];
                    $social->link = $request->input('link')[$x];
                    $social->save();

                }
            }

            return redirect()->action('Admin\SettingController@edit', 1);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delItem(Request $request)
    {
        DB::table($request->input('tableName'))->where('id', '=', $request->input('id'))->delete();
    }

}
