<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\PatientHistroy;
use App\UserWeb;
use App\City;
use App\Drugs;
use Auth;
use App\rochta;
use App\rochta_detail;

class RochtaController extends Controller
{

    public function index($id)
    {

        $patients= UserWeb::where('doctorId',$id)->paginate(5);
//        dd($patients);
        return view('site.user.Rochtas')->with(['patients' => $patients]);
    }


    public function create()
    {


    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $patientdata= UserWeb::find($id);
//        dd($patientdata);

        $patienthistory=PatientHistroy::where('PatientId',$id)->paginate(3);
//        dd($patienthistory);

        return view('site.user.patientrochta')->with([ 'patientdata' => $patientdata ,
            'patienthistory'=> $patienthistory ]);
    }


    public function addrochta($id){

        $patientdata= UserWeb::find($id);
        $drugs = Drugs::all();

        return view('site.user.addrochta')->with(['patientdata'=>$patientdata,'drugs' => $drugs ,'id' => $id]);

    }

    public function storerochta( Request $request){
        $this->validate($request, [
            'doctorId' => 'required',
            'drugs' => 'required',
        ]);
        //inserted
        $inserted =  new PatientHistroy();
        $inserted->patientId = $request->input('patientId' );
        $inserted->doctorId = $request->input('doctorId' );
        $inserted->notes = $request->input('notes' );

        if(!empty($request->input('drugs' ))){
            $inserted->drugs = implode(',' , $request->input('drugs' ) );
        }

        if(!empty($request->input('usages' ))){
            $inserted->drugs = implode(',' , $request->input('usages' ) );
        }

        $inserted->save();
//        dd($inserted);
        return redirect()->action('Site\RochtaController@show' , $request->input('patientId' ));
//        return redirect()->back();

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


    public function addpatientrochta($id)
    {

        $patientdata= UserWeb::find($id);

        return view('site.user.addpatientrochta')->with(['patientdata'=>$patientdata]);
    }


//    public function storerochtadata(Request $request){
//        $rochta =  new rochta();
//        $rochta->doctorId = $request->input('doctorId' );
//        $rochta->patientId = $request->input('patientId' );
//        $rochta->notes  = $request->input('notes');
//        $rochta->save();
////        dd($rochta);
//        $usages = $request->input('usages');

////        dd($usages);
////        $notes = $request->input('notes');
//        $drugs = $request->input('drugs');
////        dd($drugs);
////        for ($k = 0; $k < count($drugs); $k++) {
//        $drugs=[];
//        $usages=[];
//        foreach($request->input('drugs') as $k => $drugs){
////            dd($request->input('drugs'));
//            if(empty($drugs) || empty($usages[$k])){
//                continue;
//            }
//            $details = new rochta_detail();
////            dd(1);
//            $details->rochtaId = $rochta->id;
//            $details->drugId   = $drugs;
////            dd($drugs[$k]);
//            $details->usages   = $usages[$k];
////          $details->notes    = $notes[$k];
//            $details->save();
//            dd($details);
//
//        }

//        return redirect()->action('Site\RochtaController@index' , $request->input('doctorId' ));

//    }


    public function storerochtadata(Request $request){
        $rochta =  new rochta();
        $rochta->doctorId = $request->input('doctorId' );
        $rochta->patientId = $request->input('patientId' );
        $rochta->notes  = $request->input('notes');
        $rochta->save();

        $drugs = $request->input('drugs');
        $usages = $request->input('usages');

        $data = [];
        foreach($usages as $key => $usage)
        {
            if(empty($usage))
            {
               unset($usages[$key]);
            }
        }
        $use = array_values($usages);
        for($i = 0; $i < count($use); $i++){
            $details = new rochta_detail;
            $details->rochtaId = $rochta->id;
            $details->drugId = $drugs[$i];

            $details->usages = $use[$i];
            $details->save();
//            dd($usages[$k]);
        }
//        dd($data);
//        var_export($data);
//        $details =  \DB::table('rochta_details')->insert($data);

//        dd("created successfully");
        return redirect()->action('Site\RochtaController@viewrochta' , $request->input('patientId' ));



    }


//    public function viewrochta($id)
//    {
//
//        $rochtadatas =rochta::where('patientId',$id)->get();
////        dd($rochtadatas);
//
//        foreach($rochtadatas as $rochtadata){
//
//
////            echo($rochtadata->id);
////            dd($rochtadata->id);
//
//        }
////        dd($rochtadata);
//        $rochtaId=$rochtadata->id;
//
//        echo ($rochtaId);
//
////        $rochtadetails= rochta_detail::where('rochtaId',$rochtaId)->get();
////        dd($rochtadetails);
////
////        $patientdata= UserWeb::where('id',$id)->first();
////
//////        dd($patientdata->name);
////
////        return view('site.user.viewrochtadetails')->with(['rochtadetails'=>$rochtadetails, 'patientdata'=>$patientdata]);
//
//    }


    public function viewrochta($id){

       $patient=UserWeb::where('id',$id)->first();
//       dd($patient);
        $rochtadata = rochta::where('patientId',$id)->with('details')->paginate(3);
//        dd($rochtadata);
//        foreach ($rochtadata as $r) {
////            dd($r);
//            foreach ($r->details as $de) {
//                    {
//                        dd($de->usages);
//                }
//            }
//        }
        return view('site.user.viewrochtadetails',['rochtadata'=> $rochtadata,'patient'=>$patient]);



    }



}
