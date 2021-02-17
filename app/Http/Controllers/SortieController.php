<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entree;
use App\Models\Etat;
use App\Models\Detail;
use App\Models\Categorie;

class SortieController extends Controller
{
    public function getNonRemi()
    {
        $entrees = Etat::find(2)->entree()->paginate(15);
        return view('sortie.nonRemi',compact('entrees'));
    }
    public function getRemi()
    {
        $entrees = Etat::find(1)->entree()->paginate(15);
        return view('sortie.remi',compact('entrees'));
    }
    public function show(Entree $entree)
    {
        $details = $entree->details()->get();
        return view('sortie.show',compact('entree','details'));
    }
    public function showRemi(Entree $entree)
    {
        $details = $entree->details()->get();
        return view('sortie.showRemi',compact('entree','details'));
    }

}
