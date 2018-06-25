<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DronesSettings;

class DronesSettingsController extends Controller
{

    public function getList()
    {
        if (Auth::check()) {
            $settingsList = DronesSettings::get();
            return view('settings.list', compact('settingsList'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    public function view(Request $request)
    {
        if (Auth::check()) {
            $setting = DronesSettings::where('id', '=', $request->id)->first();
            return view('settings.view', compact('setting'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }


    public function edit(Request $request)
    {
        if (Auth::check()) {
            $setting = DronesSettings::where('id', '=', $request->id)->first();
            return view('settings.edit', compact('setting'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'wind_speed' => 'required',
            'operation_time_start' => 'required',
            'operation_time_end' => 'required',
            'wave_height' => 'required',
            'ship_limit' => 'required',
            'water_level' => 'required',
            'water_current' => 'required',
            'water_temperature' => 'required',
            'sun_intensity' =>'required',
        ));

        $setting = DronesSettings::where('id', '=', $request->id)->first();

        $setting->name = $request->input('name');
        $setting->wind_speed = $request->input('wind_speed');
        $setting->operation_time_start = $request->input('operation_time_start');
        $setting->operation_time_end = $request->input('operation_time_end');
        $setting->wave_height = $request->input('wave_height');
        $setting->ship_limit = $request->input('ship_limit');
        $setting->water_level = $request->input('water_level');
        $setting->water_current = $request->input('water_current');
        $setting->water_temperature = $request->input('water_temperature');
        $setting->sun_intensity = $request->input('sun_intensity');

        $setting->save();

        session()->flash('success', 'The profile is succesfully updated');

        return redirect()->route('settings.list');
    }

    public function add(){
        if (Auth::check()) {
            return view('settings.add');
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    public function create(Request $request)
    {
        $setting = DronesSettings::create([
            'name' => $request->name,
            'wind_speed' => $request->wind_speed,
            'operation_time_start' => $request->operation_time_start,
            'operation_time_end' => $request->operation_time_end,
            'wave_height' => $request->wave_height,
            'ship_limit' => $request->ship_limit,
            'water_level' => $request->water_level,
            'water_current' => $request->water_current,
            'water_temperature' => $request->water_temperature,
            'sun_intensity' => $request->sun_intensity,
        ]);

        session()->flash('success', 'The user is succesfully updated');

        return redirect(route('settings.list'));
    }


    public function delete(Request $request)
    {
        DronesSettings::where('id', '=', $request->id)->delete();
        session()->flash('success', 'The profile has been deleted!');
        return redirect(route('settings.list'));
    }
}
