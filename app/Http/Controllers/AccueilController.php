<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Entree;
use App\Models\Client;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Redevance;

class AccueilController extends Controller
{
    public function index()
    {
        $todayEntree = 0;
        $yesterdayEntree = 0;
        $todayClient  = 0;
        $yesterdayClient  = 0;
        $todayTotal = 0;
        $yesterdayTotal  = 0;
        $dateJ = Carbon::today();
        $dateH = Carbon::yesterday();
        $dateL = Carbon::now()->subDays(7);
        $lastWeekClient = Client::where('dateJour', ">", \DB::raw('NOW() - INTERVAL 1 WEEK'))->count();
        $lastMonthClient = Client::whereMonth('dateJour', '=', Carbon::now()->subMonth()->month)->count();
        $lastYearClient = Client::whereYear('dateJour', date('Y', strtotime('-1 year')))->count();
        $clientAll = Client::all();
        foreach($clientAll as $client)
        {
            if(Carbon::parse($client->dateJour)->format('Y-m-d') == Carbon::parse($dateJ)->format('Y-m-d'))
            {
                $todayClient = $todayClient +1;
            }
            if(Carbon::parse($client->dateJour)->format('Y-m-d') == Carbon::parse($dateH)->format('Y-m-d'))
            {
                $yesterdayClient = $yesterdayClient +1;
            }
        }
        $entrees = Entree::all();
        foreach($entrees as $entree)
        {
            if(Carbon::parse($entree->dateEntree)->format('Y-m-d') == Carbon::parse($dateJ)->format('Y-m-d'))
            {
                $todayEntree = $todayEntree +1;
                $todayTotal = $todayTotal + $entree->pt;
            }
            if(Carbon::parse($entree->dateEntree)->format('Y-m-d') == Carbon::parse($dateH)->format('Y-m-d'))
            {
                $yesterdayEntree = $yesterdayEntree +1;
                $yesterdayTotal = $yesterdayTotal + $entree->pt;
            }
        }
        
        //Last entree and total data
        $lastWeekEntree = Entree::where('dateEntree', ">", \DB::raw('NOW() - INTERVAL 1 WEEK'))->count();
        $lastMonthEntree = Entree::whereMonth('dateEntree', '=', Carbon::now()->subMonth()->month)->count();
        $lastYearEntree = Entree::whereYear('dateEntree', date('Y', strtotime('-1 year')))->count();

        $lastWeekTotal = Entree::where('dateEntree', ">", \DB::raw('NOW() - INTERVAL 1 WEEK'))->sum('pt');
        $lastMonthTotal = Entree::whereMonth('dateEntree', '=', Carbon::now()->subMonth()->month)->sum('pt');
        $lastYearTotal = Entree::whereYear('dateEntree', date('Y', strtotime('-1 year')))->sum('pt');
        //End

        //Données totales générées au courant de l'année
        $redevanceTotal = Redevance::sum('montant');
        $anneeEncours = date('Y');
        $nbrClient = 0;
        $cls = Client::all();
        foreach($cls as $cl)
        {
            if(Carbon::parse($cl->dateJour)->format('Y') == $anneeEncours)
            {
                $nbrClient = $nbrClient + 1; 
            }
        }
        $nbrEntree = 0;
        $ents = Entree::all();
        foreach($ents as $ent)
        {
            if(Carbon::parse($ent->dateEntree)->format('Y') == $anneeEncours)
            {
                $nbrEntree = $nbrEntree + 1; 
            }
        }
        $sommeT = 0;
        foreach($ents as $ent)
        {
            if(Carbon::parse($ent->dateEntree)->format('Y') == $anneeEncours)
            {
                $sommeT = $sommeT + $ent->pt; 
            }
        }
        $clients = Client::paginate(15);
        //Fin Données totales générées au courant de l'année

        //Données du graphe
        $tab= [];
        $tabJours = [];
        $tabEntree = [];
        $somme = 0;
        $today = date('Y-m-d');
        $last7days = Carbon::parse($today)->subDays(6);
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
        //Fin Données du graphe

        //partie qui gere les meilleurs clients
        $tableau = [];
        $clientTrier = Client::all();
        foreach($clientTrier as $client)
        {
            array_push($tableau,['mt'=>$client->entrees()->sum('pt'),'nom'=>$client->nom]);
        }
        $sorted = collect($tableau)->SortByDesc('mt');
        //fin partie qui gere les meilleurs clients
        
        return view('index',compact('redevanceTotal','nbrClient','nbrEntree','sommeT','clients','todayClient','yesterdayClient','todayEntree','yesterdayEntree','todayTotal','yesterdayTotal','lastWeekClient','lastMonthClient','lastYearClient','lastWeekEntree','lastMonthEntree','lastYearEntree','lastWeekTotal','lastMonthTotal','lastYearTotal','sorted'))->with('tab',json_encode($tab,JSON_NUMERIC_CHECK))->with('tabEntree',json_encode($tabEntree,JSON_NUMERIC_CHECK));
    }
}
