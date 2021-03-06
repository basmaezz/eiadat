<?php

namespace App\Http\Controllers\Site;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use DB;
use App\Setting;
use App\Social;
use App\Slider;
use App\Pages;
use App\News;
use App\ContactUs;
use App\Cateory;
//
use App\City;
use App\CityState;
use App\UserWeb;
use App\Doctors;
use App\Users;




class IndexController extends Controller
{
    //
    public function __construct()
    {


    }

    public function changeLang($lang)
    {
        Session(['locale' => $lang]);
        return redirect()->back();
    }


    public function index()
    {

        $allCity = City::all();
        $allCateory = Cateory::all();
        foreach ($allCateory as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr[Lang::getLocale()];

            $docotData = Doctors::where('specialId', $data->id)->get();
            $data->countDr = count($docotData);

        }

        $lastDr = UserWeb::where('type', 1)->take(16)->get();
        foreach ($lastDr as $data) {
            $docotData = Doctors::where('userId', $data->id)->first();
//            $data->image = $docotData->doctorImage;

        }

        $allBlog = News::take(6)->get();
        foreach ($allBlog as $data) {
            $nameArr1 = json_decode($data->name, true);
            $data->name = $nameArr1[Lang::getLocale()];

        }

        $indexPage = Pages::take(3)->get();
        foreach ($indexPage as $data) {
            $nameArrx = json_decode($data->name, true);
            $data->name = $nameArrx[Lang::getLocale()];

            $tittleArr = json_decode($data->tittle, true);
            $data->tittle = $tittleArr[Lang::getLocale()];

        }

        $allCity1 = City::take(21)->get();
//        dd($allCity1);
        $allCityState = CityState::all();
//        dd($allCityState);
        return view('site.web.index')->with(['allCity' => $allCity, 'indexPage' => $indexPage, 'allCityState' => $allCityState,
            'allCity1' => $allCity1, 'allCateory' => $allCateory, 'lastDr' => $lastDr, 'allBlog' => $allBlog]);
    }


    public function page($id)
    {
        $onePage = Pages::find($id);
        $nameArr = json_decode($onePage->name, true);
        $onePage->name = $nameArr[Lang::getLocale()];
        $tittleArr = json_decode($onePage->tittle, true);
        $onePage->tittle = $tittleArr[Lang::getLocale()];
        $contentArr = json_decode($onePage->content, true);
        $onePage->content = $contentArr[Lang::getLocale()];
        return view('site.web.page')->with(['onePage' => $onePage]);
    }


    public function blogs()
    {
        $blogs = News::paginate(9);
        foreach ($blogs as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr[Lang::getLocale()];

            $tittleArr = json_decode($data->tittle, true);
            $data->tittle = $tittleArr[Lang::getLocale()];
        }
        $allCateory = Cateory::all();
        foreach ($allCateory as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr[Lang::getLocale()];

            $docotData = Doctors::where('specialId', $data->id)->get();
            $data->countDr = count($docotData);

        }

        $allBlogs = News::orderBy('id', 'DESC')->take(4)->get();
        foreach ($allBlogs as $data) {
            $nameArr1 = json_decode($data->name, true);
            $data->name = $nameArr1[Lang::getLocale()];


        }


        return view('site.web.blogs')->with(['blogs' => $blogs, 'allCateory' => $allCateory, 'allBlogs' => $allBlogs]);
    }

    public function blog($id)
    {
        $blog = News::find($id);
        $nameArr = json_decode($blog->name, true);
        $blog->name = $nameArr[Lang::getLocale()];
        $tittleArr = json_decode($blog->tittle, true);
        $blog->tittle = $tittleArr[Lang::getLocale()];
        $contentArr = json_decode($blog->content, true);
        $blog->content = $contentArr[Lang::getLocale()];
        //
        $allBlogs = News::where('id', '!=', $id)->take(6)->get();
        foreach ($allBlogs as $data) {
            $nameArr1 = json_decode($data->name, true);
            $data->name = $nameArr1[Lang::getLocale()];

            $tittleArr1 = json_decode($data->tittle, true);
            $data->tittle = $tittleArr1[Lang::getLocale()];
        }
        //
        $allCateory = Cateory::take(5)->get();
        foreach ($allCateory as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr[Lang::getLocale()];

        }

        return view('site.web.blog')->with(['blog' => $blog, 'allBlogs' => $allBlogs, 'allCateory' => $allCateory,]);

    }


    public function book()
    {
        $allCateory = Cateory::all();
        foreach ($allCateory as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr[Lang::getLocale()];


        }
        return view('site.web.book')->with(['allCateory' => $allCateory]);
    }


        public function search(Request $request){

        $allCity = City::all();
        $allCateory = Cateory::all();

        foreach ($allCateory as $data)
        {
            $nameArr = json_decode($data->name , true);
//            dd($nameArr);
            $data->name = $nameArr[Lang::getLocale()];
        }
            $allDoctor = UserWeb::where('type' , 1);

            if ($request->has('SpecialId') && is_numeric($request->get('SpecialId'))) {
                $docData = Doctors::select('userId')->Where('SpecialId' , $request->get('SpecialId'))->get();
                //dd($docData);
                /*$Ides=array();
                foreach($docData as $docitems){
                    $ides[]=$docitems->userId;

                }*/
                $allDoctor = $allDoctor->whereIn('id',$docData->pluck('userId')->all());
//                dd($allDoctor);

            }



            if ($request->has('titleId')) {
                $allDoctor = $allDoctor->whereIn('titleId', 'like', '%' . $request->get('titleId') . '%');
            }



            if ($request->has('price') && $request->price != null) {
                $allDoctor = $allDoctor->where('name', 'like', '%' . $request->price . '%');
            }


            if ($request->has('docname') && $request->docname != null) {
                $allDoctor = $allDoctor->where('name', 'like', '%' . $request->docname . '%');
            }

            if ($request->has('cityId') && is_numeric($request->get('cityId'))) {
                $allDoctor = $allDoctor->where('cityId',$request->get('cityId'));
            }
            if ($request->has('stateId') && is_numeric($request->get('stateId'))) {
                $allDoctor = $allDoctor->where('stateId',$request->get('stateId'));
            }

            if ($request->has('gender')) {
                $allDoctor = $allDoctor->whereIn('gender',$request->get('gender'));
            }
            $allDoctor = $allDoctor->paginate(5);

//            $allDoctor=$allDoctor::take(5)->get();
//            $news = News::take(5)->get();
//            dd($allDoctor->get());
//            dd($allDoctor);
           return view('site.web.search')->with([
           'allCateory' => $allCateory ,
            'allCity' => $allCity ,
           'allDoctor' => $allDoctor]);


    }


//    public function search(Request $request)
//    {
//        $allCity = City::all();
//        $allCateory = Cateory::all();
//        foreach ($allCateory as $data)
//        {
//            $nameArr = json_decode($data->name , true);
////            dd($nameArr);
//            $data->name = $nameArr[Lang::getLocale()];
//        }
//
//        $allDoctor = UserWeb::where('type' , 1)->paginate(5);
////        dd($allDoctor);
//        foreach($allDoctor as $doc)
//        {
//            $docData = Doctors::WhereIn('userId' , [$doc->id])->with('Special','title_id')->first();
////            dd($docData);
////            $docData = Doctors::WhereIn('userId' , [$doc->id])->with('title_id')->first();
//            $doc->data = $docData;
////            dd($doc->data );
////         dd( $doc->data);
//            //            $doc->imageName = $docData->doctorImage;
////            dd($docData);
////            foreach ($docData as $r) {
////            echo($r->Special->id);
////            die();
////                foreach ($r->Special as $spec)
////                    {
//////                        dd($spec->id);
////                    }
////                }
//            }
////dd($allDoctor);
//        return view('site.web.search')->with([ 'allCateory' => $allCateory ,   'allCity' => $allCity ,
//            'allDoctor' => $allDoctor]);
//    }

    public function getCity(Request $request)
    {
        //dd($request->all());
        $cityId = $request->get('cityId');
        $allCity = CityState::where('cityId' , $cityId)->get();
//       var_dump($cityId);
        return  response()->json($allCity);

    }

    public function getSubCity(Request $request)
    {
        $cityId = $request->get('cityId');
        $allSubCity = CityQuarter::where('stateId' , $cityId)->get();
//        return  view('admin.city.getCity')->with([ 'allSubCity' => $allSubCity]);

    }


    public function customsearch(){

        $docname= UserWeb::where('type' , 1);
    }




    /*=====contactUs ===========================================*/
    public function contactUs()
    {
        return view('site.web.contactUs');
    }
    public function contactForm(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone' => 'numeric',
        ]);

        $contact = new ContactUs();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->message = $request->input('message');
        $contact->save();
        return redirect()->action('Site\IndexController@contactUs');

        //SendEmail
        $setting = Setting::find(1);
        mail($setting->email ,"Message from website ",$request->input('message'));


        /*==Send Email=============================*/
        $message =   'Name : '.$message = $request->input('name').'\n Email : '.$request->input('email').'\n Message :'.$request->input('message');
        $from = "info@egyprotect.com";
        $to = "info@egyprotect.com";
        $subject = "WebSite Message";
        $headers = "From: $from";
        mail($to,$subject,$message,$headers);

    }


}
