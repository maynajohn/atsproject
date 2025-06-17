<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OffreEmploi; 
use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $candidatures = Candidature::with(['candidat', 'offre'])->paginate(5);
        return view('candidature.index', compact('candidatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($offreId)
    {
        $offre = OffreEmploi::findOrFail($offreId);
        return view('candidature.create', compact('offre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $offre)
{
    // Exemple de validation ici (ajuste selon besoin)
    $request->validate([
        'lettre_motivation' => 'required|string',
        'cv' => 'required|file|mimes:pdf,doc,docx', // exemple
    ]);

    // Récupérer l'utilisateur connecté
    $candidat = Auth::user(); 

    if (!$candidat) {
        // Si utilisateur non connecté, rediriger ou erreur
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour postuler.');
    }

    // Créer la candidature
    Candidature::create([
        'offre_emploi_id' => $offre,
        'candidat_id' => $candidat->id,   // <-- important !
        'lettre_motivation' => $request->input('lettre_motivation'),
        'cv' => $request->file('cv')->store('cvs'), // ou ta logique pour stocker le fichier
    ]);

    return redirect()->back()->with('success', 'Votre candidature a été envoyée avec succès.');
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
    public function edit(Candidature $candidature) {
        return view('candidature.edit', compact('candidature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidature $candidature) {
        $candidature->update($request->all());
        return redirect()->route('candidature.index')->with('success', 'Candidature modifiée');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidature $candidature) {
        $candidature->delete();
        return redirect()->route('candidature.index')->with('success', 'Candidature supprimée');
    }
}
