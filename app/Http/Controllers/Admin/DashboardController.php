<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Province;
use App\Models\Message;
use App\Models\SiteTouristique;
use App\Models\Festival;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'regions'   => Region::count(),
            'provinces' => Province::count(),
            'sites'     => SiteTouristique::count(),
            'festivals' => Festival::count(),
            'messages'  => Message::count(),
            'non_lus'   => Message::where('lu', false)->count(),
        ];

        $derniers_messages = Message::latest()->take(5)->get();
        $regions           = Region::orderBy('nom')->get();

        return view('admin.dashboard', compact('stats', 'derniers_messages', 'regions'));
    }
}
