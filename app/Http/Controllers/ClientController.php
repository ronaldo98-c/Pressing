<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Remise;
use Carbon\Carbon;
use MercurySeries\Flashy\Flashy;

class ClientController extends Controller
{
    public function create()
    {
        $remises = Remise::all();
        return view('client.newClient',compact('remises'));
    }
    public function show(Client $client)
    {
        return view('client.show',compact('client'));
    }
    public function edit(Client $client)
    {
        $remises = Remise::all();
        return view('client.edit',compact('client','remises'));
    }
    public function store(Request $request)
    {
        $userid = \Auth::id();
        $dateJ = Carbon::now();
        if (\DB::table('remise')->where('taux', $request->remise)->exists()) {
            $remise= Remise::where('taux',$request->remise)->first();
            $remiseId = $remise->id;
        }
        else
        {
            $remiseId = null;
        }
       \DB::table('client')->insert(['nom'=>$request->nom,'sexe'=>$request->sexe,'telephone'=>$request->telephone,'user_id'=>$userid,'dateJour'=>$dateJ->toDateTimeString(),'remise_id'=>$remiseId]);
       Flashy::info('Creation éffectuée.');
       return redirect()->route('entree-all');
    }
    public function update(Request $request, Client $client)
    {
        $userid = \Auth::id();
        if (\DB::table('remise')->where('taux', $request->remise)->exists()) {
            $remise= Remise::where('taux',$request->remise)->first();
            $remiseId = $remise->id;
        }
        else
        {
            $remiseId = null;
        }
        $client->update(['nom'=>$request->nom,'sexe'=>$request->sexe,'telephone'=>$request->telephone,'user_id'=>$userid,'remise_id'=>$remiseId]);
        Flashy::message('Modification éffectuée.');
        return redirect()->route('entree-all');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        Flashy::error('Suppression éffectuée.');
        return redirect()->route('entree-all');
    }
}
