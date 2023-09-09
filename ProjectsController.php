<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'category' => 'required|min:5',
            'cost' => 'required'
        ]);
        $project = new Project();
        $project->name = $request->name;
        $project->category = $request->category;
        $project->cost = $request->cost;
        $project->status = 'Pendiente';

        $project->save();

        return redirect()->route('projects')->with('success', 'Proyecto agregado correctamente');
    }

    public function index(): View
    {
        $projects = Project::all();
        return view('control-panel.index', ['projects' => $projects] );
    }
    public function show($id): View
    {
        $project = Project::find($id);
        return view('control-panel.show', ['project' => $project] );
    }
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->name = $request->name;
        $project->category = $request->category;
        $project->cost = $request->cost;

        $project->save();
        // return view('control-panel.index', ['success' => 'Tarea actualizada'] );
        return redirect()->route('projects')->with('success', 'Projecto actualizado');
    }
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('projects')->with('success', 'Projecto eliminado');

    }
}
