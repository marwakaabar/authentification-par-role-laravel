<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view ('Back.pages.roles.index')->with('role',$role);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);

        // Créer un nouveau role
        Role::create($request->all());

        return redirect()->route('role.index')->with('success', 'Role ajouté avec succès');
 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id); // Trouver le role par son ID
        return view('Back.pages.roles.editRole', compact('role'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);

        // Trouver le produit et le mettre à jour
        $role = Role::findOrFail($id);
        $role->update($request->all());

        return redirect()->route('role.index')->with('success', 'Role mis à jour avec succès');
  
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id); // Trouver le role par son ID
        $role->delete(); // Supprimer le role

        return redirect()->route('role.index')->with('success', 'Role supprimé avec succès');
    }
}
