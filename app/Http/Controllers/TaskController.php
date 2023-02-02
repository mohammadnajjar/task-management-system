<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index() {
        $tasks = Task::with('department', 'project')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        $users = User::all();
        $departments = Department::all();
        $projects = Project::all();
        return view('tasks.create', compact('departments', 'projects','users'));
    }
    public function store(Request $request) {
//        return $request;
        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->department_id = $request->department_id;
        $task->project_id = $request->project_id;
        $task->status = $request->status;
        $task->user_id = $request->user_id;
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function show($id) {
        $task = Task::with('department', 'project')->find($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id) {
        $task = Task::find($id);
        $departments = Department::all();
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'departments', 'projects'));
    }

    public function update(Request $request, $id)
    {
        // Update the task
        $task = Task::find($id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->department_id = $request->department_id;
        $task->project_id = $request->project_id;
        $task->status = $request->input('status');
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy($id) {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
