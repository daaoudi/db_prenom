<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services=Service::paginate(3);
        return view('main.showServices',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('main.createService');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Service'=>'required'
        ]);

        $service=new Service();
        $service->Service=$request->input('Service');
        $service->save();
        return redirect('/services')->with(['success'=>'service ajouter']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
      
        return view('main.editService',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
        $request->validate([
            'Service'=>'required'
        ]);
       
        $service->update([
            'Service'=>$request->Service,
        ]);
        return redirect('/services')->with(['success'=>'service modifier']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
        $service->delete();
        return redirect('/services')->with(['success'=>'service supprimer']);
    }
}
