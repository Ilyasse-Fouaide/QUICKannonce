<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use App\Models\Image;
use App\Models\Ville;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource where annonce is valid.
     */
    public function index(Request $request)
    {
        $category = $request->input('category');
        $ville = $request->input('ville');
        $sortBy = $request->input('sort_by');
        $search = $request->input('search');

        $query = Annonce::query();

        if ($category) {
            $query->whereHas('category', function ($categoryQuery) use ($category) {
                $categoryQuery->where('nom_category', $category);
            });
        }

        if ($ville) {
            $query->whereHas('ville', function ($villeQuery) use ($ville) {
                $villeQuery->where('nom_ville', $ville);
            });
        }
        if ($sortBy === 'price') {
            $query->orderBy('price');
        } elseif ($sortBy === 'title') {
            $query->orderBy('title');
        }

        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }

        $annonces = $query->paginate(10);
        $categories = Category::all();
        $villes = Ville::all();

        return view('annonces.index', compact('annonces', 'categories', 'villes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $villes = Ville::all();
        return view('annonces.create', compact('categories', 'villes'));
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


        return redirect()->route('annonce.index')->with('info', "Veuillez patienter pendant que l'administrateur valide votre annonce.");
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
    public function update(Request $request, Annonce $annonce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        //
    }

    /**
     * Display a listing of the resource where annonce is pending.
     */
    public function pendingAnnonce()
    {
        $annonces = Annonce::with('ville', 'category')->where('status', 'pending')->get();
        return view('admin.annonces.index', compact('annonces'));
    }

    public function validAnnonce(Annonce $annonce)
    {
        $annonce->update(['status' => 'valid']);
        return back()->with('success', 'Annonce validated successfully.');
    }

    public function all()
    {
        $annonces = Annonce::latest()->simplePaginate(10);
        return view('admin.annonces.all', compact('annonces'));
    }

    public function delete(Annonce $annonce)
    {
        $annonce->delete();
        return back();
    }
}
