<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FiltreController extends Controller
{
    function getVilles($id) {
        $villes = DB::table('villes')->where('id_region', $id)->get();
        return $villes;
    }

    function getSites($id) {
        $sites = DB::table('sites')->where('id_ville', $id)->get();
        return $sites;
    }
}
