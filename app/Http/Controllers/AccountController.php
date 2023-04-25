<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Service;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $req=Account::with('service')->get();
        return view('main.showAccounts',compact('req'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $services=Service::all();
        return view('main.createAccount',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom'=>'required',
            'photo'=>'required|image|mimes:png,jpg,lpeg,jfif|max:2048',
            'adresse'=>'required',
            'ville'=>'required',
            'Service_id'=>'required|exists:services,id'
        ]);
        if($request->has('photo')){
            $file=$request->photo;
            $image_name=time(). '_'. $file->getClientOriginalName();
            $file->move(public_path('storage/img'),$image_name);
        }

        $account=new Account();
        $account->nom=$request->input('nom');
        $account->photo=$image_name;
        $account->adresse=$request->input('adresse');
        $account->ville=$request->input('ville');
        $account->Service_id=$request->input('Service_id');
        $account->save();

        return redirect('/accounts')->with(['success'=>'account ajouter']);


    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
        return view('main.editAccount',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
        $request->validate([
            'nom'=>'required',
            //'photo'=>'required|image|mimes:png,jpg,lpeg,jfif|max:2048',
            'adresse'=>'required',
            'ville'=>'required',
            //'Service_id'=>'required|exists:services,id'
        ]);

        if($request->has('photo')){
            $file=$request->photo;
            $image_name=time(). '_'. $file->getClientOriginalName();
            $file->move(public_path('storage/img'),$image_name);
            unlink(public_path('storage/img'). '/'. $account->photo );
            $account->photo=$image_name;
        }
        $account->update([
            'nom'=>$request->nom,
            'photo'=>$account->photo,
            'adresse'=>$request->adresse,
            'ville'=>$request->ville,
        ]);
        return redirect('/accounts')->with(['success'=>'account modifier']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
        $account->delete();
        return redirect('/accounts')->with(['success'=>'account supprimer']);
    }
}
