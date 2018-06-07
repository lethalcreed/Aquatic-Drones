<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function getList()
    {
//        if (Auth::check()) {
//            $search = \Request::get('search');
//
//            $usersList = Customer::where('name', 'like', '%' . $search . '%')
//                ->orWhere('email', 'like', '%' . $search . '%')
//                ->orderBy('id', 'desc')
//                ->paginate(100);

        $customerList = [];
        $search = '';
            return view('customers.list', compact('customerList', 'search'));
//        } else {
//            session()->flash('warning', 'Please login to use this function');
//            return redirect(route('login'));
//        }
    }

    public function edit(Request $request)
    {
        if (Auth::check()) {
            $user = Customer::where('id', '=', $request->id)->first();
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

        $user = Customer::where('id', '=', $request->id)->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        session()->flash('success', 'The customer is successfully updated');

        return redirect()->route('customers.list');
    }

    public function add(){
        if (Auth::check()) {
            return view('customers.add');
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    public function create(Request $request)
    {
//        $user = Customer::create([
//
//        ]);
//
//        session()->flash('success', 'The user is succesfully updated');
//
//        return redirect(route('users.list'));
    }

    public function store(Request $request)
    {
//        $this->validate($request, array(
//            'name' => 'required',
//            'email' => 'required',
//            'password' => 'required|
//               min:6|
//               regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|
//               confirmed'
//        ));
//
//        $user = new User;
//
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = $request->password;
//
//        $user->save();
////        $request->user()->save($user);
//
//        session()->flash('success', 'The user is succesfully saved!');
//
//        return redirect(route('users.list'));
    }

    public function delete(Request $request)
    {
        Customer::where('id', '=', $request->id)->delete();
        session()->flash('success', 'The user has been deleted!');
        return redirect(route('customers.list'));
    }
}
