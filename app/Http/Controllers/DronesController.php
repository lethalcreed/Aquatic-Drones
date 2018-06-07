<?php

namespace App\Http\Controllers;

use App\DroneLogs;
use Illuminate\Http\Request;
use App\Http\Handlers\DroneHandler;
use Illuminate\Support\Facades\Auth;

class DronesController extends Controller
{
    //Delete a drone
    public function delete(Request $request)
    {
        if (Auth::check()) {
            $droneHandler = new DroneHandler();
            $droneHandler->deleteDrone($request->id);
            session()->flash('success', 'The drone has been deleted!');
            return redirect(route('drones.list'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    //Return add drone form
    public function add()
    {
        if (Auth::check()) {
            $droneHandler = new DroneHandler();
            //Get default settings and harbor list
            $drone = $droneHandler->getSettings(0);
            return view('drones.add', compact('drone'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    //Store request for new drone
    public function store(Request $request)
    {
        $droneHandler = new DroneHandler();
        $droneHandler->addDrone($request->all());
        session()->flash('success', 'Drone: ' . $request->name . ' has been added!');
        return redirect(route('drones.list'));
    }

    //Edit existing drone information
    public function edit(Request $request)
    {
        if (Auth::check()) {
            $drone = $this->getDrone($request->id);
            return view('drones.edit', compact('drone'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }


    //Update request for existing drone
    public function update(Request $request)
    {
        $droneHandler = new DroneHandler();
        $droneHandler->updateDrone($request->all());
        session()->flash('success', 'Drone: ' . $request->name . ' has been updated!');
        return redirect(route('drones.list'));
    }

    //Get drone list
    public function getList()
    {
        if (Auth::check()) {
            $droneHandler = new DroneHandler();
            $dronesList = $droneHandler->getList();

            if ($dronesList) {
                foreach ($dronesList as $key => $drone) {
                    //Determine settings type
                    switch ($drone['drones_settings_id']) {
                        case 0:
                            $dronesList[$key]['settings_type'] = 'Default';
                            break;
                        default:
                            $dronesList[$key]['settings_type'] = 'Custom';
                            break;
                    }

                    //Determine Status color
                    switch ($drone['status']) {
                        case 'Idle':
                            $dronesList[$key]['status_color'] = 'green';
                            break;
                        case 'Error':
                            $dronesList[$key]['status_color'] = 'red';
                            break;
                        case 'Busy':
                            $dronesList[$key]['status_color'] = 'blue';
                            break;
                        case'Maintenance':
                            $dronesList[$key]['status_color'] = 'orange';
                            break;
                        default:
                            $dronesList[$key]['status_color'] = 'white';
                            break;
                    }

                }
            }
            return view('drones.list', compact('dronesList'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    //Add log row via API
    public function log(Request $request)
    {
        //Request validation
        $postBody = $request->all();
        switch ($postBody) {
            case !key_exists('drones_id', $postBody) || !$postBody['drones_id']:
                $response['error'] = "Missing or empty drones_id. This must be the id of the drone that is entering a log rule.";
                $response['received_body'] = $postBody;
                return $response;

            case !key_exists('drones_tasks_id', $postBody) || !$postBody['drones_tasks_id']:
                $response['error'] = "Missing or empty drones_tasks_id. This must be the id of the task the drone is currently executing";
                $response['received_body'] = $postBody;
                return $response;

            case !key_exists('message', $postBody) || !$postBody['message']:
                $response['error'] = "Missing or empty message. This must be the message / event that needs to be logged";
                $response['received_body'] = $postBody;
                return $response;
            case !key_exists('status', $postBody) || !$postBody['status']:
                $response['error'] = "Missing or empty status. This must be one of the following: warning, danger, info, success, neutral";
                $response['received_body'] = $postBody;
                return $response;
        }
        if (!in_array($request->status, ['warning', 'danger', 'info', 'success', 'neutral'])) {
            $response['error'] = "Wrong status. This must be one of the following: warning, danger, info, success, neutral";
            $response['received_body'] = $postBody;
            return $response;
        }

        $log = new DroneLogs();
        $log->fill($request->all());
        $log->save();

        $response = ['message' => 'The log row has been entered', 'success' => true];
        return response()->json($response);
    }

    //Get single drone
    private function getDrone($droneId)
    {
        $droneHandler = new DroneHandler();
        return $droneHandler->getDrone($droneId);
    }
}
