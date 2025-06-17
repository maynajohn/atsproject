<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CandidatureEntrepriseController extends Controller
{
    public function index() {
        $entreprise_id = auth()->user()->entreprise_id;

        $candidatures = Candidature::where('entreprise_id', $entreprise_id)->get();

        return view('candidature-entreprise.index', compact('candidatures'));
    }


    public function create() {
        return view('candidature-entreprise.create');
    }

    public function store(Request $request) {
        // Traitement de l'enregistrement ici
        return redirect()->route('candidature-entreprise.index');
    }

    public function edit($id) {
        // $candidature = Candidature::findOrFail($id);
        return view('candidature-entreprise.edit', compact('id'));
    }

    public function update(Request $request, $id) {
        // Mise à jour ici
        return redirect()->route('candidature-entreprise.index');
    }

    public function destroy($id) {
        // Suppression ici
        return redirect()->route('candidature-entreprise.index');
    }
}

