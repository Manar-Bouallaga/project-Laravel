<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;

class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reunions = Reunion::all();
        return view("reunion.index", compact("reunions"));

    }
    public function search(Request $request)
    {
        $search = $request->input('search'); // Get the search query from the request

        // Query to filter schools based on the search query
        $reunions = Reunion::where('date_reunion', 'like', '%' . $search . '%')->get();

        return view("reunion.index", compact("reunions"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("reunion.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'date_reunion' => 'required|date',
            'heure_rendez_vous' => 'required',
            'lieu_rencontre' => 'required',
        ]);


        $reunion = new Reunion();
        $reunion->date_reunion = $request->date_reunion;
        $reunion->heure_rendez_vous = $request->heure_rendez_vous;
        $reunion->lieu_rencontre = $request->lieu_rencontre;
        $reunion->save();
        $reunion->code_qr_reunion = QrCode::size(200)->generate('http://127.0.0.1:8000/directeurs?reunion_id=' . $reunion->id);

        $reunion->save();
        return redirect()->route('reunions.index')->with('success', 'La réunion a été créée avec succès.');
    }

    public function show(string $id)
     {
    //     $reunions = Reunion::findOrFail($id);

    //     $directeursPresents = DB::table('directeurs')
    //         ->select('directeurs.nom', 'directeurs.prenom', 'ecoles.nom_ecole as nom_ecole', 'directeurs.telephone', 'presences.date_heure_presence')
    //         ->join('presences', 'directeurs.id', '=', 'presences.directeur_id')
    //         ->join('ecoles', 'directeurs.ecole_id', '=', 'ecoles.id')
    //         ->where('presences.reunion_id', $id)
    //         ->get();
    $reunions = Reunion::find($id);

    // Récupérer les directeurs présents à la réunion
    $directeurs = $reunions->directeurs()->withPivot('date_heure_presence')->get();
    // $directeurs->load('ecole');
    // dd($directeurs);
    // Transmettre les directeurs à la vue
    return view('reunion.show', compact('reunions', 'directeurs' ));

        ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $reunions = Reunion::find($id);
        return view("reunion.edit", compact('reunions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // $reunions = Reunion::find($id);
        // $reunions->date_reunion = $request->date_reunion;
        // $reunions->heure_rendez_vous = $request->heure_rendez_vous;
        // $reunions->lieu_rencontre = $request->lieu_rencontre;

        // $reunions->save();
        // return redirect()->route('reunions.index');
        $reunions = Reunion::findOrFail($id);
        $directeursPresents = $reunions->presences()->with('directeur')->get();

        return view('reunion.show', compact('reunions', 'directeursPresents'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $reunion = Reunion::find($id);
        $reunion->delete();
        return redirect()->route("reunions.index");
    }

    public function showFormAfterScan(Request $request)
    {

        if ($request->has('qr_code')) {
            $reunion = Reunion::where('code_qr_reunion', $request->qr_code)->first();
            if ($reunion) {
                return view('directeur.create', compact('reunion'));
            } else {
                return redirect()->back()->with('error', 'Réunion non trouvée.');
            }
        } else {
            return redirect()->back()->with('error', 'Code QR manquant.');
        }
    }

}
