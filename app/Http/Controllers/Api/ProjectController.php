<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Recupera tutti i progetti con le relazioni (user, type, technologies)
        $projects = Project::with('user', 'type', 'technologies')->get();

        // Restituisci la lista dei progetti in formato JSON
        return response()->json($projects);
    }
}
