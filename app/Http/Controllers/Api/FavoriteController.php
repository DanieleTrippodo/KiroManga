<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $favorite = Favorite::firstOrCreate([
            'user_id' => Auth::id(),
            'manga_id' => $request->manga_id,
        ]);

        return response()->json($favorite);
    }

    public function destroy($mangaId)
    {
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('manga_id', $mangaId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Preferito rimosso']);
        }

        return response()->json(['message' => 'Preferito non trovato'], 404);
    }

    public function isFavorite($mangaId)
    {
        $isFavorite = Favorite::where('user_id', Auth::id())
            ->where('manga_id', $mangaId)
            ->exists();

        return response()->json(['is_favorite' => $isFavorite]);
    }
}

