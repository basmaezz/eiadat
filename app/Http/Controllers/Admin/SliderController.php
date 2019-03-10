<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Language;
use App\Slider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()) {
            //
            $slider = Slider::all();
            foreach ($slider as $data)
            {
                $nameArr = json_decode($data->name , true);
                $data->name = $nameArr[Lang::getLocale()];

            }
            return view('admin.slider.index')->with('slider', $slider);
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
            $allLang = Language::all();
            return view('admin.slider.create')->with('allLang', $allLang);
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

        //
        if (Auth::user()) {
            if ($request->hasFile('imageName')) {
                //
                $imageName = time() . '.' . $request->file('imageName')->getClientOriginalExtension();
                $request->file('imageName')->move(public_path('images'), $imageName);
            } else {
                $imageName = '';
            }
            $allLang = Language::all();
            foreach ($allLang as $data) {
                $names[$data->symbol] = $request->input('name_' . $data->symbol);
                $tittles[$data->symbol] = $request->input('tittle_' . $data->symbol);
                $contents[$data->symbol] = $request->input('content_' . $data->symbol);
            }
            $nameArr = json_encode($names);
            $tittleArr = json_encode($tittles);
            $contentsArr = json_encode($contents);
             //Insert
            $slider = new Slider();
            $slider->imageName = $imageName;
            $slider->name = $nameArr;
            $slider->tittle = $tittleArr;
            $slider->content = $contentsArr;
            $slider->save();
            //
            return redirect()->action('Admin\SliderController@index');
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
        if (Auth::user()) {
            $allLang = Language::all();
            $slider = Slider::find($id);
            $nameArr = json_decode($slider->name , true);
            $tittleArr = json_decode($slider->tittle , true);
            $contentsArr = json_decode($slider->content , true);

           // dd($nameArr[Lang::getLocale()]);

            return view('admin.slider.edit')->with(['slider'=> $slider ,
                'nameArr' => $nameArr , 'tittleArr' => $tittleArr  , 'contentsArr' => $contentsArr , 'allLang' => $allLang]);
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
    public function update(Request $request , $id)
    {
        if (Auth::user()) {
            if ($request->hasFile('imageName')) {
                //
                $imageName = time() . '.' . $request->file('imageName')->getClientOriginalExtension();
                $request->file('imageName')->move(public_path('images'), $imageName);
            } else {
                $imageName = $_POST['oldImage'];
            }
            $allLang = Language::all();
            foreach ($allLang as $data) {
                $names[$data->symbol] = $request->input('name_' . $data->symbol);
                $tittles[$data->symbol] = $request->input('tittle_' . $data->symbol);
                $contents[$data->symbol] = $request->input('content_' . $data->symbol);
            }
            $nameArr = json_encode($names);
            $tittleArr = json_encode($tittles);
            $contentsArr = json_encode($contents);
            //Insert
            $slider =  Slider::find($id);
            $slider->imageName = $imageName;
            $slider->name = $nameArr;
            $slider->tittle = $tittleArr;
            $slider->content = $contentsArr;
            $slider->save();
            //
            return redirect()->action('Admin\SliderController@index');
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
    public function destroy($id)
    {
        //
    }

    public function deleteslider($id)
    {
        DB::table('sliders')->where('id', '=', $id)->delete();
        return redirect()->action('Admin\SliderController@index');
    }
}
