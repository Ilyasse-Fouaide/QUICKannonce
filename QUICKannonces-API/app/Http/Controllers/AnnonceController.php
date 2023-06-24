<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Image;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces = Annonce::with('ville', 'category', 'images')->where('status', 'valid')->get();
        return response()->json($annonces, 200);
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
        $request->validate([
            'user' => 'required|exists:users,id',
            'category' => 'required|exists:categories,id',
            'ville' => 'required|exists:villes,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image01' => 'nullable|image|max:2048',
            'image02' => 'nullable|image|max:2048',
            'image03' => 'nullable|image|max:2048',
            'image04' => 'nullable|image|max:2048',
            'image05' => 'nullable|image|max:2048',
        ]);

        $annonce = new Annonce();
        $annonce->title = $request->input('title');
        $annonce->description = $request->input('description');
        $annonce->price = $request->input('price');
        $annonce->nom = $request->input('nom');
        $annonce->email = $request->input('email');
        $annonce->tel = $request->input('telephone');
        $annonce->user = $request->input('user');
        $annonce->category_id = $request->input('category');
        $annonce->ville_id = $request->input('ville');

        $annonce->save();

        $imageInputs = ['image01', 'image02', 'image03', 'image04', 'image05'];

        foreach ($imageInputs as $inputName) {
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/'), $filename);

                $image = new Image();
                $image->filename = 'images/' . $filename;
                $image->annonce = $annonce->id;
                $image->save();
            }
        }

        return response()->json(['info' => "Veuillez patienter pendant que l'administrateur valide votre annonce."], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Annonce $annonce)
    {
        $annonce->update(['status' => 'valid']);
        return response()->json(['message' => 'Annonce validated successfully.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();
        return response()->json(['message' => "Annonce Deleted Successfuly."], 200);
    }

    public function all()
    {
        $annonce = Annonce::with('ville', 'category', 'images')->get();
        return response()->json($annonce, 200);
    }

    public function pendingAnnonce()
    {
        $annonces = Annonce::with('ville', 'category', 'images')->where('status', 'pending')->get();
        return response()->json($annonces, 200);
    }
}
