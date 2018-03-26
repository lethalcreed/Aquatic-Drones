<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Harbor;

class HarborController extends Controller
{
    public function getList()
    {
        if (Auth::check()) {
            $harborsList = Harbor::get();
            return view('harbors.list', compact('harborsList'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    public function edit(Request $request)
    {
        if (Auth::check()) {
            $harbor = Harbor::where('id', '=', $request->id)->first();
            return view('harbors.edit', compact('harbor'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    public function update(Request $request)
    {
        $harbor = Harbor::find($request->id);
        $harbor->fill($request->all());
        $harbor->latitude = str_replace(',', '.', $request->latitude);
        $harbor->longitude = str_replace(',', '.', $request->longitude);
        $harbor->save();
        session()->flash('success', 'Harbor ' . $harbor['name'] . ' has been updated!');
        return redirect(route('harbors.list'));
    }

    public function add(){
        if (Auth::check()) {
            return view('harbors.add');
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    public function store(Request $request)
    {
        $harbor = new Harbor();
        $harbor->fill($request->all());
        $harbor->latitude = str_replace(',', '.', $request->latitude);
        $harbor->longitude = str_replace(',', '.', $request->longitude);
        $harbor->save();
        session()->flash('success', 'Harbor ' . $harbor['name'] . ' has been added!');
        return redirect(route('harbors.list'));
    }

    public function delete(Request $request)
    {
        Harbor::where('id', '=', $request->id)->delete();
        session()->flash('success', 'The harbor has been deleted!');
        return redirect(route('harbors.list'));
    }

}
