<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pressing;

class PressingController extends Controller
{
   public function create()
   {
       return view('pressing.create');
   }
   public function store(Request $request)
   {
        $request->validate([
            'nom'=>'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->logo != null)
        {
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('images'), $imageName);
        }
        else
        {
            $imageName = null;
        }
        Pressing::create(['nom'=>$request->nom,'adresse'=>$request->adresse,'telephone'=>$request->telephone,'logo'=>$imageName]);
        return redirect()->route('register-create')
                        ->with('success','Creation éffectuée.');
   }
}
