<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use MercurySeries\Flashy\Flashy;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categorie.index',compact('categories'));
    }
    public function create()
    {
        return view('categorie.create');
    }
    public function edit(Categorie $categorie)
    {
        return view('categorie.edit',compact('categorie'));
    }
    public function store(Request $request)
    {
       \DB::table('categorie')->insert(['nom'=>$request->nom,'prix'=>$request->prix,'pourcentageRepassage'=>$request->pourcentageRepassage]);
       Flashy::info('Creation éffectuée.');
       return redirect()->route('categorie-all');
    }
    public function update(Request $request, Categorie $categorie)
    {
       $categorie->update(['nom'=>$request->nom,'prix'=>$request->prix,'pourcentageRepassage'=>$request->pourcentageRepassage]);
       Flashy::message('Modification éffectuée.');
       return redirect()->route('categorie-all');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        Flashy::error('Suppression éffectuée.');
        return redirect()->route('categorie-all');
    }
}
