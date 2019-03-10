<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Language;
use App\Product;
use App\Cateory;
use Illuminate\Support\Facades\Lang;

class ProductController extends Controller
{
    public function index()
    {
        //
        if (Auth::user()) {

           // dd(Lang::getLocale());
            //
            $news = DB::table('products')->get();
            foreach ($news as $data)
            {
                $nameArr = json_decode($data->name , true);
                $data->name = $nameArr[Lang::getLocale()];

            }
            return view('admin.product.index')->with('news', $news);
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        //
        if (Auth::user()) {
            $allLang = Language::all();
            $allCat = Cateory::all();
            foreach ($allCat as $data)
            {
                $nameArr = json_decode($data->name , true);
                $data->name = $nameArr[Lang::getLocale()];
            }
            return view('admin.product.create')->with(['allLang'=> $allLang , 'allCat'=> $allCat ]);
        } else {
            return redirect()->route('login');
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()) {
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

            if ($request->hasFile('mainImg')) {
                //
                $mainImg = time() . '.' . $request->file('mainImg')->getClientOriginalExtension();
                $request->file('mainImg')->move(public_path('images'), $mainImg);
            } else {
                $mainImg = '';
            }



            //Insert
            $new = new Product();
            $new->name = $nameArr;
            $new->tittle = $tittleArr;
            $new->content = $contentsArr;
            $new->imageName = $mainImg;
            $new->catId = $request->input('catId');
            $new->price = $request->input('price');
            $new->quantity = $request->input('quantity');
            $new->save();



            //Insert Images
            if ($request->hasFile('imageName')) {
                foreach($request->file('imageName') as $img){
                    $name = time().'_'.$img->getClientOriginalName();
                    $img->move(public_path('images'), $name);

                    DB::table('productimages')->insert(
                        ['productId' => $new->id,
                            'imageName' => $name
                        ]);
                }
            }

            //
            $itr2 = $request->input('name');
            for ($x = 0; $x < count($itr2); $x++) {
                DB::table('productdetails')->insert(
                    ['productId' => $new->id,
                        'name' => $request->input('name')[$x],
                        'details' => $request->input('details')[$x],
                    ]);
            }




            return redirect()->route('product.index');
        } else {
            return redirect()->route('login');
        }
    }



    public function edit($id)
    {
        if (Auth::user()) {
            $allLang = Language::all();
            $new = Product::find($id);
            $nameArr = json_decode($new->name , true);
            $tittleArr = json_decode($new->tittle , true);
            $contentsArr = json_decode($new->content , true);
            $productImg = DB::table('productimages')->where('productId', $id)->get();

            $details = DB::table('productdetails')->where('productId', $id)->get();

            $allCat = Cateory::all();
            foreach ($allCat as $data)
            {
                $nameArrxx = json_decode($data->name , true);
                $data->name = $nameArrxx[Lang::getLocale()];
            }


            return view('admin.product.edit')->with(['new'=> $new ,
                'nameArr' => $nameArr , 'tittleArr' => $tittleArr  , 'contentsArr' => $contentsArr ,
                'allLang' => $allLang , 'productImg' => $productImg , 'details' => $details , 'allCat'=> $allCat ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()) {
            $allLang = Language::all();
            foreach ($allLang as $data) {

                $names[$data->symbol] = $request->input('name_' . $data->symbol);
                $tittles[$data->symbol] = $request->input('tittle_' . $data->symbol);
                $contents[$data->symbol] = $request->input('content_' . $data->symbol);
            }
            $nameArr = json_encode($names);
            $tittleArr = json_encode($tittles);
            $contentsArr = json_encode($contents);


            if ($request->hasFile('mainImg')) {
                //
                $mainImg = time() . '.' . $request->file('mainImg')->getClientOriginalExtension();
                $request->file('mainImg')->move(public_path('images'), $mainImg);
            } else {
                $mainImg = $request->oldMainImage;
            }

            //Insert
            $new =  Product::find($id);
            $new->name = $nameArr;
            $new->tittle = $tittleArr;
            $new->content = $contentsArr;
            $new->catId = $request->input('catId');
            $new->price = $request->input('price');
            $new->quantity = $request->input('quantity');
            $new->imageName = $mainImg;
            $new->save();
            //Insert Images
            if ($request->hasFile('imageName')) {
                foreach($request->file('imageName') as $img){

                    $name = time().'_'.$img->getClientOriginalName();
                    $img->move(public_path('images'), $name);

                    DB::table('productimages')->insert(
                        ['productId' => $id,
                            'imageName' => $name
                        ]);
                }
            }


            //
            $itr2 = $request->input('name');
            for ($x = 0; $x < count($itr2); $x++) {

                if (!empty($request->input('id')[$x])) {
                    DB::table('productdetails') ->where('id',$request->input('id')[$x])
                        ->update([
                            'name' => $request->input('name')[$x],
                            'details' => $request->input('details')[$x],
                        ]);
                }
                elseif (empty($request->input('id')[$x])) {
                    DB::table('productdetails')->insert(
                        ['productId' => $new->id,
                            'name' => $request->input('name')[$x],
                            'details' => $request->input('details')[$x],
                        ]);

                }
            }






            return redirect()->action('Admin\ProductController@index');
        } else {
            return redirect()->route('login');
        }
    }



    public function deleteproduct($id)
    {

        DB::table('products')->where('id', '=', $id)->delete();
        DB::table('productimages')->where('productId', '=', $id)->delete();
        DB::table('productdetails')->where('productId', '=', $id)->delete();
        return redirect()->action('Admin\ProductController@index');
    }





}
