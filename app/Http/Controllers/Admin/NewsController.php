<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use DB;
use App\Language;
use App\News;

class NewsController extends Controller
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
            $news = DB::table('news')->get();
            foreach ($news as $data)
            {
                $nameArr = json_decode($data->name , true);
                $data->name = $nameArr[Lang::getLocale()];

            }
            return view('admin.news.index')->with('news', $news);
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
            return view('admin.news.create')->with(['allLang'=> $allLang ]);
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
                    // 'imageName' => 'required',
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
            $new = new News();
            $new->imageName = $imageName;
            $new->name = $nameArr;
            $new->tittle = $tittleArr;
            $new->content = $contentsArr;
            $new->save();
            //
            return redirect()->route('news.index');
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
        $new = News::find($id);
        $nameArr = json_decode($new->name , true);
        $tittleArr = json_decode($new->tittle , true);
        $contentsArr = json_decode($new->content , true);


        return view('admin.news.edit')->with(['new'=> $new ,
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
    public function update(Request $request, $id)
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
            $pages =  News::find($id);
            $pages->imageName = $imageName;
            $pages->name = $nameArr;
            $pages->tittle = $tittleArr;
            $pages->content = $contentsArr;
            $pages->save();
            //
            return redirect()->action('Admin\NewsController@index');
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

    public function deletenews($id)
    {

        DB::table('news')->where('id', '=', $id)->delete();
        return redirect()->action('Admin\NewsController@index');
    }
}
