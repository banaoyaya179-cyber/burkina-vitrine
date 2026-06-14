<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    // GET /api/regions — liste toutes les régions
    public function index()
    {
        $regions = Region::select('id','slug','nom','ancien_nom','chef_lieu','zone',
            'slogan','superficie','population','densite','climat','vegetation',
            'description','langues','peuples','image_hero','image_card','image_mini_carte')
            ->get();
        return response()->json($regions);
    }

    // GET /api/regions/{slug} — détail d'une région
    public function show($slug)
    {
        $region = Region::where('slug', $slug)
            ->with(['provinces','sites','festivals','galerie','richesses','gastronomie'])
            ->firstOrFail();
        return response()->json($region);
    }

    // GET /api/search?q=... — recherche
    public function search(Request $request)
    {
        $q = $request->get('q', '');
        $regions = Region::where('nom', 'like', "%$q%")
            ->orWhere('chef_lieu', 'like', "%$q%")
            ->orWhere('description', 'like', "%$q%")
            ->select('id','slug','nom','chef_lieu','zone','image_card')
            ->get();
        return response()->json($regions);
    }

    // GET /api/stats — statistiques globales
    public function stats()
    {
        $stats = [
            'total_regions'    => Region::count(),
            'total_population' => Region::sum('population'),
            'total_superficie' => Region::sum('superficie'),
            'zones'            => Region::distinct()->pluck('zone'),
        ];
        return response()->json($stats);
    }
}
