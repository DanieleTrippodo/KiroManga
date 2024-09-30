<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Volume;

class VolumeController extends Controller
{
    public function show($id)
    {
        $volume = Volume::with('pages')->findOrFail($id);
        return response()->json($volume);
    }
}
