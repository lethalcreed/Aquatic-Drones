<?php

namespace App\Http\Handlers;

use App\Drones;
use App\Harbor;
use App\DronesSettings;
use App\Handlers\SettingsHandler;

class DroneHandler
{
    public function getList()
    {
        return Drones::get()->toArray();
    }

    public function getSettings($settings_id)
    {
        $drones = [];

        //Parsing the drone settings to a usable list and fetching them if neccesairy
        if ($settings_id == 0) {
            $drones['overwrite_standard_settings'] = 0;
        } else {
            $drones['overwrite_standard_settings'] = 1;
        }
        $droneSettings = DronesSettings::where('id', '=', $settings_id)->first()->toArray();

        $drones['wind_speed'] = $droneSettings['wind_speed'];
        $drones['operation_time_start'] = $droneSettings['operation_time_start'];
        $drones['operation_time_end'] = $droneSettings['operation_time_end'];
        $drones['wave_height'] = $droneSettings['wave_height'];
        $drones['ship_limit'] = $droneSettings['ship_limit'];
        $drones['water_level'] = $droneSettings['water_level'];
        $drones['water_current'] = $droneSettings['water_current'];
        $drones['water_temperature'] = $droneSettings['water_temperature'];
        $drones['sun_intensity'] = $droneSettings['sun_intensity'];

        return $drones;

    }

    public function getDrone($id)
    {
        $drones = Drones::where('id', '=', $id)->first()->toArray();
        return $drones;
    }

    public function updateDrone($in_drone)
    {
        $drone = Drones::find($in_drone['id']);
        $drone->fill($in_drone);
//        $settings_id = 0;
//
//        if ($in_drone['overwrite_standard_settings'] > 0) {
//            $droneSettings = new DronesSettings();
//            $droneSettings->fill($in_drone);
//            $droneSettings->save();
//            $settings_id = $droneSettings->id;
//        }
//
//        $drone->harbor_id = $in_drone['harbor'];
        $drone->drones_settings_id = $in_drone['settings'];
        $drone->save();
    }

    public function addDrone($in_drone)
    {
        $drone = new Drones();
        $drone->fill($in_drone);

        $drone->drones_settings_id = $in_drone['settings'];
        return $drone->save();
    }

    public function deleteDrone($id)
    {
        Drones::where('id', '=', $id)->delete();
    }
}