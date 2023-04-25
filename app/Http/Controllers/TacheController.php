<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $re=Tache::with('account')->get();
        return view('main.showTaches',compact('re'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $accounts=Account::all();
        return view('main.createTache',compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'objet'=>'required',
            'montant'=>'required|numeric',
            'user_id'=>'required|exists:accounts,id'
        ]);
        $tache=new Tache();
        $tache->objet=$request->input('objet');
        $tache->montant=$request->input('montant');
        $tache->user_id=$request->input('user_id');
        $tache->save();
        return redirect('/taches')->with(['success'=>'tache ajouter']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tache $tache)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tache $tache)
    {
        //
        return view('main.editTache',compact('tache'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tache $tache)
    {
        //
        $request->validate([
            'objet'=>'required',
            'montant'=>'required|numeric',
            'user_id'=>'required|exists:accounts,id'
        ]);
        $tache->update([
            'objet'=>$request->objet,
            'montant'=>$request->montant,

        ]);

        return redirect('/taches')->with(['success'=>'tache modifier']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tache $tache)
    {
        //
        $tache->delete();
        return redirect('/taches')->with(['success'=>'tache supprimer']);
    }
}
