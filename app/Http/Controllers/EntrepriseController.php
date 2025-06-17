<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $entreprises = Entreprise::paginate(5);
        return view('entreprise.index', compact('entreprises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('entreprise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $request->all();

        // Ajouter user_id à partir de l'utilisateur connecté
        $data['user_id'] = auth()->id();

        Entreprise::create($data);

        return redirect()->route('entreprise.index')->with('success', 'Entreprise ajoutée');
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
    public function edit(Entreprise $entreprise) {
        return view('entreprise.edit', compact('entreprise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entreprise $entreprise) {
        $entreprise->update($request->all());
        return redirect()->route('entreprise.index')->with('success', 'Entreprise modifiée');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entreprise $entreprise) {
        $entreprise->delete();
        return redirect()->route('entreprise.index')->with('success', 'Entreprise supprimée');
    }
}
