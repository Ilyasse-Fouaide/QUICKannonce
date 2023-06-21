<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villes = Ville::simplePaginate(8);
        return view('admin.villes.index', compact('villes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.villes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(["nom_ville" => ['required']]);

        $ville = new Ville();
        $ville->nom_ville = $request->nom_ville;
        $ville->save();

        return redirect()->route('ville.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ville $ville)
    {
        return view('admin.villes.show', compact('ville'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ville $ville)
    {
        return view('admin.villes.edit', compact('ville'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ville $ville)
    {
        $request->validate(["nom_ville" => ['required']]);
        $ville->update(["nom_ville" => $request->nom_ville]);
        return redirect()->route('ville.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ville $ville)
    {
        $ville->delete();
        return back();
    }
}
