<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use DB;
use App\Language;
use App\Cateory;


class CateoryController extends Controller
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
            $category = Cateory::all();
            foreach ($category as $data)
            {
                $nameArr = json_decode($data->name , true);
                $data->name = $nameArr[Lang::getLocale()];

            }
            return view('admin.category.index')->with(['category', $category]);
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
            $category = Cateory::all();
            foreach ($category as $data)
            {
                $nameArr = json_decode($data->name , true);
                $data->name = $nameArr[Lang::getLocale()];

            }
            return view('admin.category.create')->with([ 'allLang' => $allLang  ,  'category' => $category]);
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
            //var_dump($names);
            $nameArr = json_encode($names);
           // dd($nameArr);
            $tittleArr = json_encode($tittles);
            $contentsArr = json_encode($contents);
            //Insert
            $main = new Cateory();
            $main->imageName = $imageName;
            $main->parentId = $request->parentId ; 
            $main->name = $nameArr;
            $main->tittle = $tittleArr;
            $main->content = $contentsArr;
            $main->inHome = $request->inHome;
            $main->save();
            //
          return redirect()->action('Admin\CateoryController@index');
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
            $main = Cateory::find($id);
            $nameArr = json_decode($main->name , true);
            $tittleArr = json_decode($main->tittle , true);
            $contentsArr = json_decode($main->content , true);
            
            $allCategory = Cateory::all();
            foreach ($allCategory as $data)
            {
                $nameArr1 = json_decode($data->name , true);
                $data->name = $nameArr1[Lang::getLocale()];

            }

            //  var_dump($tittleArr);

            return view('admin.category.edit')->with(['main'=> $main ,
                'nameArr' => $nameArr , 'tittleArr' => $tittleArr  , 'contentsArr' => $contentsArr , 'allLang' => $allLang  , 'allCategory' => $allCategory]);
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
            $main =  Cateory::find($id);
            $main->imageName = $imageName;
            $main->parentId = $request->parentId ; 
            $main->name = $nameArr;
            $main->tittle = $tittleArr;
            $main->content = $contentsArr;
            $main->inHome = $request->inHome;
            $main->save();
            //
            return redirect()->action('Admin\CateoryController@index');
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

    public function deleteCat($id)
    {
        DB::table('cateories')->where('id', '=', $id)->delete();
        return redirect()->action('Admin\CateoryController@index');
    }
}
