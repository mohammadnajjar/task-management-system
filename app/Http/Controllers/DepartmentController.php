<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        $departments = Department::with('projects', 'tasks','users')->get();
//        return $departments;
        return view('departments.index', compact('departments'));
    }

    public function create() {
        return view('departments.create');
    }

    public function store(Request $request) {
        $department = new Department();
        $department->name = $request->input('name');
        $department->save();
        return redirect()->route('departments.index');
    }

    public function show($id) {
        $department = Department::with('tasks', 'projects')->find($id);

        return view('departments.show', compact('department'));
    }

    public function edit($id) {
        $department = Department::find($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id) {
        $department = Department::find($id);
        $department->name = $request->name;
        $department->save();
        return redirect()->route('departments.index');
    }

    public function destroy($id) {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('departments.index');
    }
    public function addProject($department_id, $project_id)
    {
        $department = Department::findOrFail($department_id);
        $department->projects()->attach($project_id);
        return redirect()->back();
    }
    public function tasks($id)
    {
        $department = Department::findOrFail($id);
        $tasks = $department->tasks;
        return view('departments.tasks', compact('tasks'));
    }
    public function projects($id)
    {
        $department = Department::findOrFail($id);
        $projects = $department->projects;
        return view('departments.projects', compact('projects'));
    }

}
