<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Models\Ecole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministrateurController extends Controller
{

    public function login(){
        return view("administrateurs.auth.login");
    }

    // public function loginPost(Request $request){
    //     $admin = $request->only('email', 'password');
    //     // Log the input to see if it's correct
    //     \Log::info('Input:', $admin);

    //     if (Auth::attempt($admin)) {
    //         return redirect('/administrateurs')->with('success', 'Logged in successfully');
    //     }

    //     return back()->with('error', 'Invalid credentials. Please try again.');
    // }


    public function index()
    {
        $ecoles = Ecole::all()->take(3);
        return view('administrateurs.index',compact('ecoles'));
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
