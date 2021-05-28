<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserRoles = UserRole::all();

        foreach ($UserRoles as $key => $UserRole) {
            $UserRoles[$key]->role_name = Role::find($UserRole->role_id)->roles;
            $User = User::find($UserRole->user_id);
            $UserRoles[$key]->user_name = $User->firstname . " " . $User->lastname;
            
        };
        
        return view('userRoles.index',['UserRoles' => $UserRoles ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all(['id','roles as name' ]);
        $user = User::all(['id',DB::raw('CONCAT(firstname," ",lastname) AS name')]);
        return view('userRoles.create',['roles' => $roles, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roles = UserRole::create([
            'user_id' => $request->input('user_id'),
            'role_id' => $request->input('role_id'),
            'created_date' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route("userRoles.index");
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
        //
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
}
