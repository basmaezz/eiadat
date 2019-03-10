<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Language;
use App\Pages;
use Illuminate\Support\Facades\Lang;
class PagesController extends Controller
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
            $pages = Pages::all();
            foreach ($pages as $data)
            {
                $nameArr = json_decode($data->name , true);
                $data->name = $nameArr[Lang::getLocale()];

            }
            return view('admin.pages.index')->with('pages', $pages);
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
            return view('admin.pages.create')->with(['allLang'=> $allLang ]);
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
                $this->validate($request, [
                    'name_' . $data->symbol => 'required',
                    'tittle_' . $data->symbol => 'required',
                    'content_' . $data->symbol => 'required',

                ]);

                $names[$data->symbol] = $request->input('name_' . $data->symbol);
                $tittles[$data->symbol] = $request->input('tittle_' . $data->symbol);
                $contents[$data->symbol] = $request->input('content_' . $data->symbol);
            }
            $nameArr = json_encode($names);
            $tittleArr = json_encode($tittles);
            $contentsArr = json_encode($contents);
            //Insert
            $page = new Pages();
            $page->imageName = $imageName;
            $page->name = $nameArr;
            $page->tittle = $tittleArr;
            $page->content = $contentsArr;
            $page->location = $request->location;
            $page->save();
            //
            return redirect()->action('Admin\PagesController@index');
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
            $pages = Pages::find($id);
            $nameArr = json_decode($pages->name , true);
            $tittleArr = json_decode($pages->tittle , true);
            $contentsArr = json_decode($pages->content , true);

            //  var_dump($tittleArr);

            return view('admin.pages.edit')->with(['pages'=> $pages ,
                'nameArr' => $nameArr , 'tittleArr' => $tittleArr  , 'contentsArr' => $contentsArr ,
                'allLang' => $allLang ]);
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
            $pages =  Pages::find($id);
            $pages->imageName = $imageName;
            $pages->name = $nameArr;
            $pages->tittle = $tittleArr;
            $pages->content = $contentsArr;
            $pages->location = $request->location;
            $pages->save();
            //
            return redirect()->action('Admin\PagesController@index');
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

    public function destroyPage($id)
    {
        DB::table('pages')->where('id', '=', $id)->delete();
        return redirect()->action('Admin\PagesController@index');
    }
}
