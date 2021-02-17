<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remise;
use MercurySeries\Flashy\Flashy;

class RemiseController extends Controller
{
    public function index()
    {
        $remises = Remise::all();
        return view('remise.index',compact('remises'));
    }
    public function create()
    {
        return view('remise.create');
    }
    public function edit(Remise $remise)
    {
        return view('remise.edit',compact('remise'));
    }
    public function store(Request $request)
    {
       \DB::table('remise')->insert(['taux'=>$request->taux,'description'=>$request->description,'user_id'=>\Auth::user()->id]);
       Flashy::info('Creation éffectuée.');
       return redirect()->route('remise-all');
    }
    public function update(Request $request, Remise $remise)
    {
        $remise->update(['taux'=>$request->taux,'description'=>$request->description,'user_id'=>\Auth::user()->id]);
        Flashy::message('Modification éffectuée.');
        return redirect()->route('remise-all');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remise $remise)
    {
        $remise->delete();
        Flashy::error('Suppression éffectuée.');
        return redirect()->route('remise-all');
    }
}
