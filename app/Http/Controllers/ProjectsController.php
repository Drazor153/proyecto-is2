<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
}
