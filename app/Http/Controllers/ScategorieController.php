<?php

namespace App\Http\Controllers;

use App\Models\Scategorie;
use Illuminate\Http\Request;

class ScategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $scategorie=Scategorie::with("category")->get();
            return response()->json($scategorie);        }
            catch (\Throwable $th) {
            //throw $th;
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            $categories = new Scategorie([
                'nomcategorie' => $request->input("nomcategorie"),
                'imagecategorie' => $request->input("imagecategorie"),
                'categorieID' => $request->input("categorieID")

            ]);
            $categories->save();
            return response()->json("categories", 200);
        }  catch (\Exception $e) {

            return response()->json($e->getMessage(), $e->getCode());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $scategorie=Scategorie::with('categorie')->findOrFail($id);//ya yel9ah yala ken ma9ahech yemchi lel exception
            return response()->json($scategorie,200);

        }catch(\Exception $e){
            return response()->json($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id )
    {
        try{
            $scategorie=Scategorie::findOrFail($id);
            $scategorie->update($request->all());
            return response()->json($scategorie,200);

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
            $scategorie=Scategorie::findOrFail($id);
            $scategorie->delete();
            return response()->json("scategorie supprime avec Sucees",200);

        }  catch(\Exception $e){
            return response()->json($e->getMessage(),$e->getCode());
        }     //
    }
}
