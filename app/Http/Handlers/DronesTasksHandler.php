<?php

namespace App\Http\Handlers;

use App\Drones;
use App\DronesTasks;
use App\Routes;
use App\TaskDrones;

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

    public function getDronesAndTaskDrones($id)
    {
        $taskDrones = TaskDrones::where('tasks_id', '=', $id)->get();
        $taskDronesArray = [];
        foreach ($taskDrones as $taskDrone) {
            $taskDronesArray[$taskDrone->drones_id] = $taskDrone->tasks_id;
        }
        $dronesAndTaskDrones['tasks_id'] = $taskDronesArray;

        return $dronesAndTaskDrones;
    }

    public function getTask($id)
    {
        $task = DronesTasks::where('id', '=', $id)->first()->toArray();

        //Get drones and routes and merge them into the main drone array
        return array_merge($task, $this->getDronesAndRoutes(), $this->getDronesAndTaskDrones($id));
    }

    public function updateTask($in_task){
        $task = DronesTasks::find($in_task['id']);
        $task->fill($in_task);
        $task->routes_id = $in_task['route'];
        $task->save();

        // Delete taskDrones
        TaskDrones::where('tasks_id', '=', $in_task['id'])->delete();

        // Add taskDrones
        foreach ($in_task['drone'] as $id => $taskDrone)
        {
            $taskDrones = new TaskDrones();
            $taskDrones->tasks_id = $in_task['id'];
            $taskDrones->drones_id = $taskDrone;
            $taskDrones->save();
        }
    }

    public function addTask($in_task){
        $task = new DronesTasks();
        $task->fill($in_task);
        $task->routes_id = $in_task['route'];
        $task->save();

        $taskId = $task->id;

        foreach($in_task['drone'] as $taskDrone) {
            $taskDrones = new TaskDrones();
            $taskDrones->tasks_id = $taskId;
            $taskDrones->drones_id = $taskDrone;
            $taskDrones->save();
        }
    }

    public function deleteTask($id){
        DronesTasks::where('id', '=', $id)->delete();
        TaskDrones::where('tasks_id', '=', $id)->delete();
    }
}