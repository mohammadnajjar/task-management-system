<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index() {
        $projects = Project::with('departments', 'tasks')->get();
//        return $projects;
        return view('projects.index', compact('projects'));
    }
    public function create()
    {
        $departments = Department::all();
        return view('projects.create', compact('departments'));
    }
    // Create a new project
    public function store(Request $request)
    {
//        return $request;
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'deadline' => 'required',
            'departments' => 'required'
        ]);

        // Create the new project
        $project = new Project;
        $project->name = $validatedData['name'];
        $project->description = $validatedData['description'];
        $project->deadline = $validatedData['deadline'];
        $project->save();
        $departments=$validatedData['departments'];
        // Attach the departments to the project
        $project->departments()->sync($validatedData['departments']);


        // Return the new project
//        return response()->json($project, 201);
        return redirect()->route('projects.index');
    }


    public function show($id)
    {
        $project = Project::findOrFail($id);
        $departments = $project->departments;
        $tasks = $project->tasks;
        $deadline = $project->deadline;
        return view('projects.show', compact('project', 'departments', 'tasks', 'deadline'));

    }



    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $departments = Department::all();
        return view('projects.edit', compact('project', 'departments'));
    }

    // Update an existing project
    public function update(Request $request, $id)
    {
//        return $request;
        // Find the project
        $project = Project::findOrFail($id);
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'deadline' => 'required',
            'departments' => 'required'
        ]);

//        $project->name =
//        $project->description = $validatedData['description'];
//        $project->deadline = $validatedData['deadline'];
        $project->update([
            'name'=>$validatedData['name'],
            'description'=>$validatedData['description'],
            'deadline'=>$validatedData['deadline'],
        ]);
        // Attach the departments to the project
        $project->departments()->sync($validatedData['departments']);
        return redirect()->route('projects.index');

    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->departments()->detach();
        $project->tasks()->delete();
        $project->delete();
        return redirect()->route('projects.index');
    }



}
