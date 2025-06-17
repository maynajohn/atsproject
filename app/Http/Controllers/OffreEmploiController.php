<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OffreEmploi;
use App\Models\Entreprise;

class OffreEmploiController extends Controller
{

    public function mesOffres()
{
    // Récupérer les offres de l'utilisateur connecté (si tu as un système d'authentification)
    // Sinon récupérer toutes les offres
    $offres = Offre::with('entreprise')->get();

    return view('offres.mes_offres', compact('offres'));
}

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $offres = OffreEmploi::with('entreprise')->paginate(5);
        return view('offre.index', compact('offres'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {
    $entreprises = Entreprise::all();
    return view('offre.create', compact('entreprises'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        OffreEmploi::create($request->all());
        return redirect()->route('offre.index')->with('success', 'Offre ajoutée');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $offre = OffreEmploi::findOrFail($id);
    $entreprises = Entreprise::all();  // N'oublie pas d'importer le modèle Entreprise en haut du fichier !

    return view('offre.edit', compact('offre', 'entreprises'));
}
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OffreEmploi $offre) {
        $offre->update($request->all());
        return redirect()->route('offre.index')->with('success', 'Offre modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OffreEmploi $offre) {
        $offre->delete();
        return redirect()->route('offre.index')->with('success', 'Offre supprimée');
    }
public function publie()
{
    $offres = OffreEmploi::paginate(10);
    return view('offre.publie', compact('offres'));
}


}
