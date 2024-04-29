<?php

namespace App\Http\Controllers;

use App\Models\Directeur;
use App\Models\Ecole;
use Illuminate\Http\Request;

class DirecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ecoles = Ecole::all();
        return view("directeur.create", compact('ecoles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $ecoles = Ecole::all();
        return view("directeur.create", compact('ecoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $store = new Directeur();
        $store->id = $request->id;
        $store->nom = $request->nom;
        $store->prenom = $request->prenom;
        $store->telephone = $request->telephone;
        $store->ecole_id = $request->ecole_id;
        $store->save();
        return redirect()->route("directeurs.create");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // return view("directeurs.create");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
