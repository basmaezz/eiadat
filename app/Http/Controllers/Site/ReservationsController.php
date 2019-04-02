<?php

namespace App\Http\Controllers\Site;

use App\UserWeb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservations;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $allDocotr = UserWeb::where('type' , 1)->get();
        $allPatient = UserWeb::where('type' , 2)->get();
        return view('Site.user.addreservation')->with([ 'allDocotr'=> $allDocotr , 'allPatient'=> $allPatient]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'reservDate' => 'required',
        ]);
        //inserted
        $inserted =  new Reservations();
        $inserted->doctorId = $request->input('doctorId' );
        $inserted->patientId = $request->input('patientId' );
        $inserted->type = $request->input('type' );
        $inserted->reservDate =  date('Y-m-d', strtotime($request['reservDate']));
//        $inserted->reservDate =  date('Y-m-d', strtotime(str_replace('-', '/', $request['reservDate'])));

        $inserted->addedBy = 3;
        $inserted->save();
//        dd($inserted);
        return redirect()->action('Site\ReservationsController@show',['id'=>Auth::guard('users-web')->user()->id]);

//        return redirect()->action('Site\UserController@profile',['id'=>Auth::guard('users-web')->user()->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservationsData = reservations::where('doctorId',$id)->with('Patient')->paginate(10);
//        dd($reservationsData);

        return view('site.user.doctorReservations')->with(['reservationsData'=>$reservationsData]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
//        dd($id);

        $rules = [

            "type"=> "required",
            "reservDate"=> "required",

        ];
        $data = $this->validate(request(),$rules,[],[

            "type"=>"type",
            "reservDate"=>"reservDate",

        ]);
//        dd($data);
        session()->flash('success','تم تحديث البيانات بنجاح');

        reservations::where('id',$id)->update($data);


        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        reservations::where('doctorId',auth()->guard('users-web')->user()->id)->where('id',$id)->delete();
        return redirect()->back();
    }
}
