<?php

namespace App\Http\Controllers;

use App\Models\ProductOwner;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects-view.index', ['projects' => $projects] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $product_owners = ProductOwner::all();
        return view('projects-view.create', ['product_owners' => $product_owners]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'category' => 'required|min:5',
            'cost' => 'required',
            'product_owner' => 'required'
        ]);

        if ($request->product_owner == '1') {
            $request->validate([
                'po_exist' => Rule::notIn([0])
            ]);
            $po_id = $request->po_exist;

        }else{
            $request->validate([
                'po_new' => 'required'
            ]);
            $new_po = new ProductOwner();
            $new_po->name = $request->po_new;
            $new_po->save();
            // dd($new_po);
            $po_id = $new_po->po_id;
        }
        
        $project = new Project();
        $project->name = $request->name;
        $project->category = $request->category;
        $project->cost = $request->cost;
        $project->status = 'Pendiente';
        $project->po_id = $po_id;

        // dd($project);

        $project->save();

        return redirect()->route('projects.index')->with('success', 'Proyecto agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('projects-view.show', ['project' => $project] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('projects-view.edit', ['project' => $project] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);
        $project->name = $request->name;
        $project->category = $request->category;
        $project->cost = $request->cost;

        $project->save();
        // return view('control-panel.index', ['success' => 'Tarea actualizada'] );
        return redirect()->route('projects.index')->with('success', 'Projecto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projecto eliminado');

    }
}
