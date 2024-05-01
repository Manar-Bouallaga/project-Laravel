<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("reunion.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'date_reunion' => 'required',
            'heure_rendez_vous' => 'required',
            'lieu_rencontre' => 'required',

        ]);


        $reunion = new Reunion();
        $reunion->date_reunion = $request->date_reunion;
        $reunion->heure_rendez_vous = $request->heure_rendez_vous;
        $reunion->lieu_rencontre = $request->lieu_rencontre;
        $reunion->save();
        $reunion->code_qr_reunion = QrCode::size(200)->generate('reunion_' . $reunion->id);
        $reunion->save();
        return redirect()->route('reunions.index')->with('success', 'La réunion a été créée avec succès.');
    }

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
        $reunions = Reunion::find($id);
        return view("reunion.edit", compact('reunions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $reunions = Reunion::find($id);
        $reunions->date_reunion = $request->date_reunion;
        $reunions->heure_rendez_vous = $request->heure_rendez_vous;
        $reunions->lieu_rencontre = $request->lieu_rencontre;

        $reunions->save();
        return redirect()->route('reunions.index');
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
