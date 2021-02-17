<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Entree;
use App\Models\Categorie;
use App\Models\Detail;
use App\Models\Client;
use App\Models\Redevance;

class DetailController extends Controller
{
    public function store(Request $request,Entree $entree)
    {
       $categories = Categorie::all();
       $entree = Entree::where('id',$entree->id)->first();
       $categorie = Categorie::where('nom',$request->categorie)->first();
       Detail::create(['quantite'=>$request->quantite,'marque'=>$request->marque,'couleur'=>$request->couleur,'categorie_id'=>$categorie->id,'entree_id'=>$entree->id,'repassage'=>$request->choix]);
       return view('detail.create',compact('entree','categories'));
    }
    public function show(Entree $entree)
    {
        $client = $entree->client;
        $remiseClient = $client->remise->taux??0;
        $details = Detail::where('entree_id',$entree->id)->get();
        if($entree->type == "simple")
        { 
             $total = 0;
             foreach($details as $detail)
             {
                $produit = $detail->categorie->prix*$detail->quantite;
                if($detail->repassage=="Oui")
                {
                   $pourcentageRepassage = ($produit*$detail->categorie->pourcentageRepassage) / 100;
                }
                else
                {
                   $pourcentageRepassage = 0;
                }
                $mult = $produit + $pourcentageRepassage;
                $total = $total + $mult;
             }
        }
        else
        {
            $total = $entree->pt;
            foreach($details as $detail)
            {
                if(isset($entree->prixRepassage))
                {
                    $total = $total + ($detail->quantite*$entree->prixRepassage);
                }
                else
                {
                    $total = $total;
                }
            } 
        }
        if(isset($client->remise))
        {
            $ptRemise = $total * ($client->remise->taux / 100);
        }
        else
        {
            $ptRemise = null;
        }
        if($client->redevances->first() != null)
        {
            $redevance = $client->redevances->first();
            $montantRedevance = $redevance->montant;
        }
        else
        {
            $montantRedevance = 0;
        }
        return view('detail.vue',compact('entree','details','total','remiseClient','ptRemise','montantRedevance'));
    }
    public function edit(Detail $detail)
    {
        $categories = Categorie::all();
        return view('detail.edit',compact('detail','categories'));
    }
    public function update(Request $request, Detail $detail)
    {
        $entree = $detail->entree->first();
        $categorie = Categorie::where('nom',$request->categorie)->first();
        $detail->update(['quantite'=>$request->quantite,'marque'=>$request->marque,'couleur'=>$request->couleur,'repassage'=>$request->choix,'categorie_id'=>$categorie->id,'entree_id'=>$detail->entree->id]);
        return $this->show($entree);
    }
    public function modifierdetailEntree(Request $request,Entree $entree)
    {
        $date = Carbon::now();
        $entree = Entree::where('id',$entree->id)->first();
        $client = $entree->client;
        $categorie = Categorie::where('nom',$request->categorie)->first();
        $totalVetement = Detail::where('entree_id',$entree->id)->sum('quantite');
        $details = Detail::where('entree_id',$entree->id)->get();
        if($entree->type == "simple")
        { 
             $total = 0;
             foreach($details as $detail)
             {
                $produit = $detail->categorie->prix*$detail->quantite;
                if($detail->repassage=="Oui")
                {
                   $pourcentageRepassage = ($produit*$detail->categorie->pourcentageRepassage) / 100;
                }
                else
                {
                   $pourcentageRepassage = 0;
                }
                $mult = $produit + $pourcentageRepassage;
                $total = $total + $mult;
             }
        }
        else
        {
            $total = $entree->pt;
            foreach($details as $detail)
            {
                if(isset($entree->prixRepassage))
                {
                    $total = $total + ($detail->quantite*$entree->prixRepassage);
                }
                else
                {
                    $total = $total;
                }
            } 
        }
        //Verifie si le client a des remises
        if(isset($client->remise))
        {
           $ptRemise = $total * ($client->remise->taux / 100);
           if($ptRemise > $request->montantVerse)
           {
               if($client->redevances->first() != null)
               {
                   $redevance = Redevance::where('client_id',$client->id)->first();
                   $redevance->update(['dateJour'=>$date->toDateTimeString(),'montant'=>$redevance->montant + ($ptRemise-$request->montantVerse)]);
               }
               else
               {
                   Redevance::create(['dateJour'=>$date->toDateTimeString(),'client_id'=>$client->id,'montant'=>$ptRemise-$request->montantVerse]);
               }
               $entree->update(['pt'=>$ptRemise,'montantRestant'=>0]);
           }
           if($ptRemise < $request->montantVerse)
           {
               if($client->redevances->first() != null)
               {
                   $redevance = Redevance::where('client_id',$client->id)->first();
                   if(($request->montantVerse -$ptRemise) == $redevance->montant)
                   {
                       $entree->update(['pt'=>$ptRemise + $redevance->montant,'montantRestant'=>0]);
                       $redevance->update(['dateJour'=>$date->toDateTimeString(),'montant'=> ($request->montantVerse -$ptRemise) - $redevance->montant]);
                   }
                   if(($request->montantVerse -$ptRemise) < $redevance->montant)
                   {
                       $entree->update(['pt'=>$request->montantVerse,'montantRestant'=>0]);
                       $redevance->update(['dateJour'=>$date->toDateTimeString(),'montant'=> $redevance->montant - ($request->montantVerse -$ptRemise)]);
                   }
                   if(($request->montantVerse -$ptRemise) > $redevance->montant)
                   {
                       $entree->update(['pt'=>$ptRemise + $redevance->montant,'montantRestant'=>$request->montantVerse - ($ptRemise  + $redevance->montant)]);
                       $redevance->update(['dateJour'=>$date->toDateTimeString(),'montant'=>0]);
                   }
               }
               else
               {
                    $entree->update(['pt'=>$ptRemise,'montantRestant'=>$request->montantVerse - $ptRemise]);
               }
           }
           if($ptRemise == $request->montantVerse)
           {
               $entree->update(['pt'=>$request->montantVerse,'montantRestant'=>0]);
           }
        }
        else
        {
           if($total > $request->montantVerse)
           {
               if($client->redevances->first() != null)
               {
                   $redevance = Redevance::where('client_id',$client->id)->first();
                   $redevance->update(['dateJour'=>$date->toDateTimeString(),'montant'=>$redevance->montant + ($total-$request->montantVerse)]);
               }
               else
               {
                   Redevance::create(['dateJour'=>$date->toDateTimeString(),'client_id'=>$client->id,'montant'=>$total-$request->montantVerse]);
               }
               $entree->update(['pt'=>$total,'montantRestant'=>0]);
           }
           if($total < $request->montantVerse)
           {
               if($client->redevances->first() != null)
               {
                   $redevance = Redevance::where('client_id',$client->id)->first();
                   if(( $request->montantVerse -$total) == $redevance->montant)
                   {
                       $entree->update(['pt'=>$total + $redevance->montant,'montantRestant'=>0]);
                       $redevance->update(['dateJour'=>$date->toDateTimeString(),'montant'=> ($request->montantVerse - $total) - $redevance->montant]);
                   }
                   if(($request->montantVerse -$total) < $redevance->montant)
                   {
                       $entree->update(['pt'=>$request->montantVerse,'montantRestant'=>0]);
                       $redevance->update(['dateJour'=>$date->toDateTimeString(),'montant'=> $redevance->montant - ($request->montantVerse -$total)]);
                   }
                   if(($request->montantVerse -$total) > $redevance->montant)
                   {
                       $entree->update(['pt'=>$total + $redevance->montant,'montantRestant'=>$request->montantVerse -( $total  + $redevance->montant)]);
                       $redevance->update(['dateJour'=>$date->toDateTimeString(),'montant'=>0]);
                   }
               }
               else
               {
                    $entree->update(['pt'=>$total,'montantRestant'=>$request->montantVerse - $total]);
               }
           }
           if($total == $request->montantVerse)
           {
               $entree->update(['pt'=>$request->montantVerse,'montantRestant'=>0]);
           }
        }
        $entree->update(['totalVetement'=>$totalVetement,'montantVerse'=>$request->montantVerse]);
        return redirect()->route('entree-print',compact('entree'));
    }
}
