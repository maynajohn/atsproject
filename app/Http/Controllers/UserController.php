<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $users = User::orderBy('nom')->paginate(5);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:users',
            'mot_de_passe' => 'required',
            'role' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('user.index')->with('success', 'Utilisateur ajouté');
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
    public function edit(User $user) {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) {
        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'Utilisateur modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Utilisateur supprimé');
    }
}
