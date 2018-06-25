<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use App\usersToCustomers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function getList()
    {
        $search = \Request::get('search');

        $customerList = Customer::where('name', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('customers.list', compact('customerList', 'search'));
    }

    public function edit(Request $request)
    {
        $customer = Customer::where('id', '=', $request->id)->first();
        $users = User::get();

        foreach ($users as $user) {
            if (usersToCustomers::where('users_id', $user->id)->where('customers_id', $request->id)->count()) {
                $user->linked = true;
            }
        }
        return view('customers.edit', compact('customer', 'users'));
    }

    public function update(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
        ));

        $customer = Customer::where('id', '=', $request->id)->first();

        $customer->name = $request->input('name');
        $customer->description = $request->input('description');
        $customer->website = $request->input('website');

        $customer->save();

        session()->flash('success', 'The customer is successfully updated');

        return redirect()->route('customers.list');
    }

    public function add()
    {
        return view('customers.add');
    }

    public function create(Request $request)
    {
        $customer = new Customer();
        $customer->fill($request->all());
        $customer->save();

        session()->flash('success', 'The customer is succesfully created');

        return redirect(route('customers.list'));
    }

    public function delete(Request $request)
    {
        Customer::where('id', '=', $request->id)->delete();
        session()->flash('success', 'The user has been deleted!');
        return redirect(route('customers.list'));
    }
}
