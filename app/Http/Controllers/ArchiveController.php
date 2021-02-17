<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entree;
use App\Models\Etat;

class ArchiveController extends Controller
{
    public function index()
    {
        $entrees = Etat::find(1)->entree()->paginate(15);
        return view('archive.archive',compact('entrees'));
    }
    public function show(Entree $entree)
    {
        $details = $entree->details()->get();
        return view('archive.show',compact('entree','details'));
    }
}
