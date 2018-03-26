<?php

namespace App\Http\Handlers;

use App\Drones;
use App\DronesTasks;
use App\Routes;

class DronesTasksHandler
{
    public function getList()
    {
        return DronesTasks::get()->toArray();
    }

    public function getDronesAndRoutes()
    {
        $dronesAndRoutes = [];

        //Getting al the harbors and parsing to a usable list
        $drones = Drones::get();
        $droneArray = [];
        foreach ($drones as $drone) {
            $droneArray[$drone->id] = $drone->name;
        }
        $dronesAndRoutes['drones'] = $droneArray;

        //Getting all routes and parsing to a usable list
        $routes = Routes::get();
        $routesArray = [];
        foreach ($routes as $route) {
            $routesArray[$route->id] = $route->name;
        }
        $dronesAndRoutes['routes'] = $routesArray;

        return $dronesAndRoutes;
    }

    public function getTask($id)
    {
        $task = DronesTasks::where('id', '=', $id)->first()->toArray();

        //Get drones and routes and merge them into the main drone array
        return array_merge($task, $this->getDronesAndRoutes());
    }

    public function updateTask($in_task){
        $task = DronesTasks::find($in_task['id']);
        $task->fill($in_task);

        $task->drones_id = $in_task['drone'];
        $task->routes_id = $in_task['route'];
        $task->save();
    }

    public function addTask($in_task){
        $task = new DronesTasks();
        $task->fill($in_task);

        $task->drones_id = $in_task['drone'];
        $task->routes_id = $in_task['route'];
        $task->save();
    }

    public function deleteTask($id){
        DronesTasks::where('id', '=', $id)->delete();
    }
}