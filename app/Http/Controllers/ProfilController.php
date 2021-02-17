<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Entree;

class ProfilController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $tab= [];
        $tabJours = [];
        $tabEntree = [];
        $somme = 0;
        $today = date('Y-m-d');
        $last7days = Carbon::parse($today)->subDays(6);
        $entrees = $user->entree;
        $period = CarbonPeriod::create($last7days->format('Y-m-d'),$today);
        foreach ($period as $date) {
            array_push($tabJours,$date->format('Y-m-d'));
        }
        foreach ($period as $date) {
            array_push($tab,$date->format('D'));
        }
        foreach($tabJours as $tabJour)
        {
            foreach($entrees as $entree)
            {
                if(Carbon::parse($entree->dateEntree)->format('Y-m-d') == $tabJour)
                {
                    $somme = $entree->pt + $somme;
                }
            }
            array_push($tabEntree,$somme);
            $somme = 0;
        }
        $nbrClient = count($user->client);
        $nbrEntree = count($user->entree);
        $somme = Entree::where('user_id',$user->id)->sum('pt');
        return view('profil',compact('nbrClient','nbrEntree','somme'))->with('tab',json_encode($tab,JSON_NUMERIC_CHECK))->with('tabEntree',json_encode($tabEntree,JSON_NUMERIC_CHECK));
    }
}
