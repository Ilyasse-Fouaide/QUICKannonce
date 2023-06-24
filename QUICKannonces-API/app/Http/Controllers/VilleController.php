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
        $villes = Ville::all();
        return response()->json($villes, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        return response()->json(['message' => 'Ville Added Successfuly.'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ville $ville)
    {
        return response()->json($ville, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ville $ville)
    {
        return response()->json($ville, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ville $ville)
    {
        $request->validate(["nom_ville" => ['required']]);

        $ville->update([
            "nom_ville" => $request->nom_ville,
        ]);

        return response()->json(['message' => 'Ville updated Successfuly.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ville $ville)
    {
        $ville->delete();
        return response()->json(["message" => "Ville Deleted Successfuly."], 200);
    }
}
