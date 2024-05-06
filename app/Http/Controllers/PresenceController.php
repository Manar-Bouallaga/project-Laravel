<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $presences = Presence::all();
        return view("presences.create", compact('presences'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $store = new Presence();

        $store->directeur_id = $request->directeur_id;
        $store->reunion_id = $request->reunion_id;
        $store->date_heure_presence = $request->date_heure_presence;
        $store->save();
        return redirect()->route("directeurs.create");
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
