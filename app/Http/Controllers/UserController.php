<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function getList()
    {
        if (Auth::check()) {
            $usersList = User::all();

            return view('users.list', compact('usersList'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    public function edit(Request $request)
    {
        if (Auth::check()) {
            $user = User::where('id', '=', $request->id)->first();
            return view('users.edit', compact('user'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required'
        ));

        $user = User::where('id', '=', $request->id)->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        session()->flash('success', 'The user is succesfully updated');

        return redirect()->route('users.list');
    }

    public function add(){
        if (Auth::check()) {
            return view('users.add');
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    public function create(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', '=', 'Client')->first();  //choose the default role upon user creation.
        $user->attachRole($role);


        session()->flash('success', 'The user is succesfully updated');

        return redirect(route('users.list'));
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|
               min:6|
               regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|
               confirmed'
        ));

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
//        $request->user()->save($user);

        session()->flash('success', 'The user is succesfully updated');

        return redirect(route('users.list'));
    }

    public function delete(Request $request)
    {
        User::where('id', '=', $request->id)->delete();
        session()->flash('success', 'The user has been deleted!');
        return redirect(route('users.list'));
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_client']) {
            $user->roles()->attach(Role::where('name', 'Client')->first());
        }
        if ($request['role_operator']) {
            $user->roles()->attach(Role::where('name', 'Operator')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $name = Request::get('name');

        $result = DB::table('customers')
            ->select(DB::raw("*"))
            ->where('name', '=', $name)
            ->get();

        return $result;
    }
}
