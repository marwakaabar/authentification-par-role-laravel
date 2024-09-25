<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();
        return view ('Back.pages.test')->with('produits',$produits);

        //return view('Back.pages.test', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'marque' => 'required',
            'prix' => 'required',
            'description' => 'required',
        ]);

        // Créer un nouveau produit
        Produit::create($request->all());

        return redirect()->route('produit.index')->with('success', 'Produit ajouté avec succès');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

         // Afficher le formulaire d'édition d'un produit

    public function edit($id)
    {
        $produit = Produit::findOrFail($id); // Trouver le produit par son ID
        return view('Back.pages.editProduit', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Valider la requête
        $request->validate([
            'name' => 'required',
            'marque' => 'required',
            'prix' => 'required|numeric',
            'description' => 'required',
        ]);

        // Trouver le produit et le mettre à jour
        $produit = Produit::findOrFail($id);
        $produit->update($request->all());

        return redirect()->route('produit.index')->with('success', 'Produit mis à jour avec succès');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id); // Trouver le produit par son ID
        $produit->delete(); // Supprimer le produit

        return redirect()->route('produit.index')->with('success', 'Produit supprimé avec succès');
    }
}
