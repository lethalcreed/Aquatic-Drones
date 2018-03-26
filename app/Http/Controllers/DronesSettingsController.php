<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DronesSettings;

class DronesSettingsController extends Controller
{
    public function edit()
    {
        if (Auth::check()) {
            $settings = DronesSettings::where('id', '=', 0)->first();
            return view('settings.standard', compact('settings'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    public function update(Request $request)
    {
        $settings = DronesSettings::find(0);
        $settings->fill($request->all());
        $settings->save();
        session()->flash('success', 'The standard drone settings have been updated');
        return redirect(route('home'));
    }
}
