<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::orderBy('nom')->get();
        return view('admin.regions', compact('regions'));
    }

    public function edit($id)
    {
        $region = Region::with(['provinces','sites','festivals','galerie','richesses'])
                        ->findOrFail($id);
        return view('admin.region-edit', compact('region'));
    }

    public function update(Request $request, $id)
    {
        $region = Region::findOrFail($id);

        $request->validate([
            'nom'         => 'required|string',
            'chef_lieu'   => 'required|string',
            'slogan'      => 'nullable|string',
            'description' => 'nullable|string',
            'histoire'    => 'nullable|string',
            'superficie'  => 'nullable|integer',
            'population'  => 'nullable|integer',
            'climat'      => 'nullable|string',
            'vegetation'  => 'nullable|string',
        ]);

        $region->update($request->only([
            'nom', 'chef_lieu', 'slogan', 'description',
            'histoire', 'superficie', 'population',
            'climat', 'vegetation', 'zone'
        ]));

        return back()->with('success', 'Région mise à jour avec succès.');
    }
}
