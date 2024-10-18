<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories = Categorie::all();
            return response()->json($categories);

        }catch(\Throwable $th){
            return response()->json("impossible de recuperer");

        }
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     try {
        $categorie=new Categorie([
            "nomcategorie"=> $request->input("nomcategorie"),
            "imagecategorie"=> $request->input("imagecategorie"),
        ]);
        $categorie->save();
        return response()->json($categorie,200);
     } catch (\Exception $e) {
        return response()->json("impossible de ajouter");
     }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id){
        try{
            $categorie=Categorie::findOrFail($id);//ya yel9ah yala ken ma9ahech yemchi lel exception
            return response()->json($categorie,200);

        }catch(\Exception $e){
            return response()->json($e->getMessage(),$e->getCode());
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $categorie=Categorie::findOrFail($id);
            $categorie->update($request->all());
            return response()->json($categorie,200);

        }  catch(\Exception $e){
            return response()->json($e->getMessage(),$e->getCode());
        }     //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $categorie=Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json("categorie supprime avec Sucees",200);

        }  catch(\Exception $e){
            return response()->json($e->getMessage(),$e->getCode());
        }     //
    }

}
