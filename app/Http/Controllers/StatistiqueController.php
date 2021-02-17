<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Entree;
use App\Models\Client;

class StatistiqueController extends Controller
{
    public function index()
    {
        return view('statistique');
    }
    public function store(Request $request)
    {
        $total = 0;
        $ents = Entree::all();
        if($request->choix == "Clients")
        {
            $cls = Client::all();
            foreach($cls as $cl)
            {
                if(Carbon::parse($cl->dateJour)->format('Y') == $request->annee)
                {
                    $total = $total + 1; 
                }
            }
        }
        if($request->choix == "Entrees")
        {
            foreach($ents as $ent)
            {
                if(Carbon::parse($ent->dateEntree)->format('Y') == $request->annee)
                {
                    $total = $total + 1; 
                }
            }
        }
        if($request->choix == "Capital")
        {
            foreach($ents as $ent)
            {
                if(Carbon::parse($ent->dateEntree)->format('Y') == $request->annee)
                {
                    $total = $total + $ent->pt; 
                }
            }
        }
        return view('statistique',compact('total'));
    }
}
