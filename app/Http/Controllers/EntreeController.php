<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Etat;
use App\Models\Entree;
use App\Models\Pressing;
use App\Models\Categorie;
use App\Models\Redevance;
use PDF;
class EntreeController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(15);
        return view('entree.index',compact('clients'));
    }
    public function create(Client $client)
    {
        return view('entree.create',compact('client'));
    }
    public function store(Request $request,Client $client)
    {
        $request->validate([
            'type'=>'required'
        ]);
        $date = Carbon::now();
        $etat = Etat::where('nom','nonRemi')->first();
        if($request->poids != null) 
        {
            $poids = $request->poids;
            $total = $poids*$request->pu;
        }
        else
        {
            $poids =null;
            $total = null;
        }
        $categories = Categorie::all();
        $entree = Entree::create(['dateEntree'=>$date->toDateTimeString(),'pu'=>$request->pu,'poids'=>$poids,'prixRepassage'=>$request->prixRepassage,'type'=>$request->type,'pt'=>$total,'client_id'=>$client->id,'user_id'=>\Auth::user()->id]);
        $entree->etats()->attach($etat->id);
        return view('detail.create',compact('entree','categories'));
    }
    public function remettre(Entree $entree)
    {
        $date = Carbon::now()->toDateTimeString();
        $entree->update(['dateSortie'=>$date]);
        \DB::table('entree_etat')->where('entree_id', $entree->id)->update(['etat_id'=>1]);
        return redirect()->route('sortieRemi-all')
                        ->with('success','Remise éffectuée.');
    }
    public function print(Entree $entree)
    {
        $date =$entree->dateSortie; 
        $details = $entree->details()->get();
        $pressing = Pressing::where('id',$entree->user->pressing_id)->first();
        $userNom = $entree->user->nom;
        $clientTelephone = $entree->client->telephone;
        $clientNom = $entree->client->nom;
        $pressingNom = $pressing->nom;
        $pressingAdresse= $pressing->adresse;
        $pressingTelephone= $pressing->telephone;
        $pressingLogo= $pressing->logo;
        //$customPaper = array(0,0,600,520);
        $pdf = PDF::loadView('print', compact('entree','date','userNom','clientTelephone','pressingNom','pressingAdresse','pressingTelephone','pressingLogo','clientNom','details'));
        //$pdf->setPaper($customPaper);
        return $pdf->stream();
        
    }
    /*public function edit(Entree $entree)
    {
        $clients = Client::all();
        return view('entree.edit',compact('entree','clients'));    
    }*/
    /*public function update(Request $request, Entree $entree)
    {
        $request->validate([
            'nbrVetement'=>'required',
            'description'=>'required',
            'type'=>'required'
        ]);
        $userid = \Auth::id();
        if($request->type == "parTaille") 
        {
            $pu = null;
            $poids = $request->poids;
            $total = $poids*1000;  
        }
        elseif($request->type == "simple")
        {
            $poids =null;
            $pu = $request->pu;
            $total = $pu *$request->nbrVetement;
        }
        $client = Client::where('nom',$request->client)->first();
        $entree->update(['pu'=>$pu,'poids'=>$poids,'type'=>$request->type,'pt'=>$total,'nbrVetement'=>$request->nbrVetement,'description'=>$request->description,'client_id'=>$client->id]);
        return redirect()->route('sortieNonRemi-all')
                ->with('success','Modification effectuée.');
        
    }*/
    public function destroy(Entree $entree)
    {
        $entree->delete();
        return redirect()->route('sortieNonRemi-all')
                        ->with('success','Suppression effectuée');
    }
}
