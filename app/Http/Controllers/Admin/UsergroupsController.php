<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Usergroups;
use App\UserWeb;
use App\Menu;
use App\UserMenu;
use App\UserController;

class UsergroupsController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            //
            $allData = Usergroups::all();
            return view('admin.group.index')->with('lang', $allData);
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
            $allMenu = Menu::where('parentId' ,'!=' , 0)->get();
            return view('admin.group.create')->with([ 'allMenu' => $allMenu ,  ]);
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
                'name' => 'required|unique:usergroups',
            ]);
            $insert = new Usergroups();
            $insert->name = $request->input('name');
            //menu
            $menu = $request->input('menu');
            $permission = json_encode($menu);
            $insert->permission = $permission;
            $insert->save();
            foreach ($menu as $m) {
                $insert_m = new UserMenu();
                $insert_m->groupId = $insert->id;
                $insert_m->menuId = $m;
                $insert_m->value = 1;
               $insert_m->save();

                //Controller Fuction
                $function = $request->input('permission_' . $m);
               // var_dump($function);
                foreach ($function as $fun) {
                    $insertFunc = new UserController();
                    $insertFunc->groupId = $insert->id;
                    $insertFunc->menuId = $m;
                    $insertFunc->name = $fun;
                    $insertFunc->value = 1;
                    $insertFunc->save();
                }
            }
            return redirect()->action('Admin\UsergroupsController@index');
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
         $editData = Usergroups::find($id);
        $allMenu = Menu::where('parentId' ,'!=' , 0)->get();
        $groupMenu = UserMenu::where('groupId', '=', $id)->get();
        return view('admin.group.edit')->with(['editData' => $editData, 'allMenu' => $allMenu, 'groupMenu' => $groupMenu]);
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


            $update = Usergroups::find($id);
            $update->name = $request->input('name');
            //menu
            $menu = $request->input('menu');
           // $permission = json_encode($menu);
            $update->permission = '';
            $update->save();
            //
          
            UserMenu::where('groupId', $id)->delete();
            foreach ($menu as $m) {

                $insert_m = new UserMenu();
                $insert_m->groupId = $id;
                $insert_m->menuId = $m;
                $insert_m->value = 1;
                $insert_m->save();

                //Controller Fuction
               UserController::where([ 'menuId'=> $m , 'groupId'=> $id])->delete();
                $function = $request->input('permission_' . $m);
             //  var_dump($function);
            // dd($function);
                foreach ($function as $fun) {
                    $insertFunc = new UserController();
                    $insertFunc->groupId = $id;
                    $insertFunc->menuId = $m;
                    $insertFunc->name = $fun;
                    $insertFunc->value = 1;
                    $insertFunc->save();
                }
            }

            return redirect()->action('Admin\UsergroupsController@index');
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
    public function delgroup($id)
    {
        $checkData =  DB::table('users-web')->where('groupId', '=', $id)->get();
        if(count($checkData) > 0)
        {
           // return redirect()->action('Admin\UsergroupsController@index');
        }
        else{
            DB::table('usergroups')->where('id', '=', $id)->delete();
            UserMenu::where('groupId' ,$id)->delete();
            UserController::where('groupId' ,$id)->delete();
            return redirect()->action('Admin\UsergroupsController@index');
        }


    }
}
