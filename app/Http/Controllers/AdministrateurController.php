<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Models\Ecole;
use App\Models\Reunion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministrateurController extends Controller
{

    public function login(){
        return view("administrateurs.auth.login");
    }

    public function index()
    {
        $ecoles = Ecole::all()->take(3);;
        $reunions = Reunion::all()->take(3);;
        return view('administrateurs.index',compact('ecoles','reunions'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
