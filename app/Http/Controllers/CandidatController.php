<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //$candidats = Candidat::with('user')->paginate(5);
        return view('candidat.index', compact('candidats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('candidat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        Candidat::create($request->all());
        return redirect()->route('candidat.index')->with('success', 'Candidat ajouté');
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
    public function edit(Candidat $candidat) {
        return view('candidat.edit', compact('candidat'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidat $candidat) {
        $candidat->update($request->all());
        return redirect()->route('candidat.index')->with('success', 'Candidat modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidat $candidat) {
        $candidat->delete();
        return redirect()->route('candidat.index')->with('success', 'Candidat supprimé');
    }
}
