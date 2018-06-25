<?php

namespace App\Http\Controllers;

use App\Drones;
use Illuminate\Http\Request;
use App\Http\Handlers\DronesTasksHandler;
use Illuminate\Support\Facades\Auth;

class DronesTasksController extends Controller
{
    //Delete a task
    public function delete(Request $request)
    {
        if (Auth::check()) {
            $dronesTasksHandler = new DronesTasksHandler();
            $dronesTasksHandler->deleteTask($request->id);
            session()->flash('success', 'The task has been deleted!');
            return redirect(route('tasks.list'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    //Return add task form
    public function add()
    {
        if (Auth::check()) {
            $dronesTasksHandler = new DronesTasksHandler();
            //Get default settings and harbor list
            $task = $dronesTasksHandler->getDronesAndRoutes();

            $drones = Drones::get();
            return view('tasks.add', compact('task', 'drones'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    //Store request for new task
    public function store(Request $request)
    {
        $dronesTasksHandler = new DronesTasksHandler();
        $dronesTasksHandler->addTask($request->all());
        session()->flash('success', 'Task: ' . $request->name . ' has been added!');
        return redirect(route('tasks.list'));
    }

    //Edit existing task information
    public function edit(Request $request)
    {
        if (Auth::check()) {
            $dronesTasksHandler = new DronesTasksHandler();
            $task = $dronesTasksHandler->getTask($request->id);
            return view('tasks.edit', compact('task'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }

    //Update request for existing task
    public function update(Request $request)
    {
        $dronesTasksHandler = new DronesTasksHandler();
        $dronesTasksHandler->updateTask($request->all());
        session()->flash('success', 'Task: ' . $request->name . ' has been updated!');
        return redirect(route('tasks.list'));
    }

    //Get task list
    public function getList()
    {
        if (Auth::check()) {
            $dronesTasksHandler = new DronesTasksHandler();
            $tasksList = $dronesTasksHandler->getList();

            if ($tasksList) {
                foreach ($tasksList as $key => $task) {
                    //Determine Status color
                    switch ($task['priority']) {
                        case 'High':
                            $tasksList[$key]['priority_color'] = 'red';
                            break;
                        case 'Medium':
                            $tasksList[$key]['priority_color'] = 'orange';
                            break;
                        case 'Low':
                            $tasksList[$key]['priority_color'] = 'green';
                            break;
                        default:
                            $tasksList[$key]['priority_color'] = 'white';
                            break;
                    }

                }
            }
            return view('tasks.list', compact('tasksList'));
        } else {
            session()->flash('warning', 'Please login to use this function');
            return redirect(route('login'));
        }
    }
}
