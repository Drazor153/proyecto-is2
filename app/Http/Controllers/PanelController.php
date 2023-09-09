<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function show(): View
    {
        $projects = Project::all();
        return view('control-panel.show', ['projects' => $projects] );
    }

    public function create(): View
    {
        return view('control-panel.new-project');
    }
}
