<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function show(): View
    {
        return view('control-panel.show');
    }

    public function create(): View
    {
        return view('control-panel.new-project');
    }
}
