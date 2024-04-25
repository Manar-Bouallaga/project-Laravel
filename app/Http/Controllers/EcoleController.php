<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use Illuminate\Http\Request;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $ecoles = Ecole::all();

        return view("ecole.index",compact("ecoles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ecole.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $store = new Ecole();
        $store->nom_ecole = $request->nom_ecole;
        $store->categorie = $request->categorie;
        $store->save();
        return redirect()->route('ecoles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ecoles=Ecole::find($id);
        return view ('ecole.edite',compact('ecoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ecoles=Ecole::find($id);
        $ecoles->nom_ecole = $request->input('nom_ecole');
        $ecoles->categorie= $request->input('categorie');
        $ecoles->save();
        return redirect()->route('ecoles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ecoles=Ecole::find($id);
        $ecoles->delete();
        return redirect()->route('ecoles.index');

    }
}
