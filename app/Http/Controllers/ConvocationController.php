<?php

namespace App\Http\Controllers;

use App\Models\Convocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConvocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $convocations = Convocation::with('candidature')->paginate(5);
        return view('convocation.index', compact('convocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('convocation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        Convocation::create($request->all());
        return redirect()->route('convocation.index')->with('success', 'Convocation ajoutée');
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
    public function edit(Convocation $convocation) {
        return view('convocation.edit', compact('convocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Convocation $convocation) {
        $convocation->update($request->all());
        return redirect()->route('convocation.index')->with('success', 'Convocation modifiée');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Convocation $convocation) {
        $convocation->delete();
        return redirect()->route('convocation.index')->with('success', 'Convocation supprimée');
    }
}
