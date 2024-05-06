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
    public function create(Request $request)
    {
        //
        $directeur = Directeur::first(); // Ou toute autre méthode pour récupérer le directeur souhaité

        // Vérifier si le directeur existe
        if ($directeur) {
            // sSi le directeur existe, récupérer son ID
            $id = $directeur->id;
        } else {
            // Si aucun directeur n'est trouvé, définir l'ID sur null ou une autre valeur par défaut
            $id = null; // Ou une autre valeur par défaut selon vos besoins
        }

        // Récupérer toutes les écoles (comme vous l'avez déjà fait)
        $ecoles = Ecole::all();

        // Passer les données à la vue
        return view("directeur.create", compact('ecoles', 'id'));
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
        $id = $store->id;
        // $idReunion = $request->query('reunion_id');
        // compact("id")
        return redirect()->route("presences.create",compact("id"));
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
