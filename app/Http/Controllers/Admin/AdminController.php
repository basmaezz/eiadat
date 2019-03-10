<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;
use DB;
use Auth;
use App\User;
use App\Usergroups;

class AdminController extends Controller
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
            $allData = User::all();
            foreach($allData as $data)
            {
                $groupData = Usergroups::find($data->groupId);
                $data->groupName = $groupData->name;
            }
            return view('admin.admin.index')->with('allData', $allData);
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

            $serialNo = Helper::randomString();
            $allGroup = Usergroups::all();
            return view('admin.admin.create')->with([ 'serialNo' => $serialNo,'allGroup' => $allGroup ]);
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
                'email' => 'required|email|unique:users',
                'phone' => 'required',
                'password' => 'required',
            ]);
            $insert =  new User();
            $insert->name = $request->input('name' );
            $insert->email = $request->input('email' );
            $insert->phone = $request->input('phone' );
            $insert->password = Hash::make($request->password);
            $insert->serialNo = $request->input('serialNo' );
            $insert->groupId = $request->input('groupId' );
            $insert->save();
            return redirect()->action('Admin\AdminController@index');
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

            $allGroup = Usergroups::all();
            $editData = User::find($id);

            return  view('admin.admin.edit')->with(['editData' => $editData , 'allGroup' => $allGroup]);
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

            ]);
            //
            if(empty($request->input('password' )))
            {
                $pass = $request->input('oldPassword' );
            }
            else{
                $pass = $request->input('password' );
            }

            $update =  User::find($id);
            $update->name = $request->input('name' );
            $update->email = $request->input('email' );
            $update->phone = $request->input('phone' );
            $update->password = Hash::make($pass);
            $update->serialNo = $request->input('serialNo' );
            $update->groupId = $request->input('groupId' );
            $update->save();

            return redirect()->action('Admin\AdminController@index');
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
    public function delAdmin($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect()->action('Admin\AdminController@index');
    }
}
