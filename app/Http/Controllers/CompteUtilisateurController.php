<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Etat;
use App\Models\Entree;
use App\Models\Pressing;
use MercurySeries\Flashy\Flashy;

class CompteUtilisateurController extends Controller
{
    public function index()
    {
        $users = User::where('role','caissier')->get();
        return view('compteUtilisateur.index',compact('users'));
    }
    public function create()
    {
        $pressings = Pressing::all();
        return view('compteUtilisateur.create',compact('pressings'));
    }
    public function show(User $user)
    {
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
        return view('compteUtilisateur.show',compact('nbrClient','nbrEntree','somme','user'))->with('tab',json_encode($tab,JSON_NUMERIC_CHECK))->with('tabEntree',json_encode($tabEntree,JSON_NUMERIC_CHECK));
    }
    public function store(Request $request)
    {
        $etat = Etat::where('nom','actif')->first();
        $pressing = Pressing::where('nom',$request->pressing_nom)->first();
        $user = User::create(['nom'=>$request->nom,'dateEmbauche'=>$request->dateEmbauche,'age'=>$request->age,'sexe'=>$request->sexe,'telephone'=>$request->telephone,'email'=>$request->email,'password'=>Hash::make($request->password),'role'=>'caissier','pressing_id'=>$pressing->id]);
        $user->etats()->attach($etat->id);
        Flashy::info('Creation éffectuée.');
        return redirect()->route('compte-all');
    }
    public function update(Request $request, User $user)
    {
        $etat = Etat::where('nom','actif')->first();
        $user->update(['nom'=>$request->nom,'dateEmbauche'=>$request->dateEmbauche,'age'=>$request->age,'sexe'=>$request->sexe,'telephone'=>$request->telephone,'email'=>$request->email]);
        $user->etats()->attach($etat->id);
        Flashy::message('Modification éffectuée.');
        return redirect()->route('profil-all');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Flashy::error('Suppression éffectuée.');
        return redirect()->route('compte-all');
    }
    public function bloquer(User $user)
    {
        \DB::table('users_etat')->where('user_id', $user->id)->update(['etat_id'=>4]);
        Flashy::error('Utilisateur bloqué.');
        return redirect()->route('compte-all');
    }
    public function activer(User $user)
    {
        \DB::table('users_etat')->where('user_id', $user->id)->update(['etat_id'=>3]);
        Flashy::info('Utilisateur activé.');
        return redirect()->route('compte-all');
    }
}
