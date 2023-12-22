<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use App\Models\Ville;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getVilles($id)
    {
        $villes = Ville::whereRegion_id($id)->pluck('name', 'id');
        return response()->json($villes);
    }
    public function getSecteurs($id)
    {
        $secteurs = Secteur::where('ville_id', $id)->pluck('name', 'id');
        return response()->json($secteurs);
    }
}
