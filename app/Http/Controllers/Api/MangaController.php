<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Manga;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function index()
    {
        $manga = Manga::with('tags')->get();
        return response()->json($manga);
    }
}
