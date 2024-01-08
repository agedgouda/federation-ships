<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faction;
use App\Http\Resources\FactionResource;

class FactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factions = Faction::get();
        return response()->json(FactionResource::collection($factions));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $faction = Faction::create($request->all());
        return response()->json($faction);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faction = Faction::findOrFail($id);
        return new FactionResource($faction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faction = Faction::where('id',$id)
        ->update($request->all());
        $faction = Faction::findOrFail($id);     
        return response()->json($faction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faction = Faction::find($id);
        $faction->delete();
        return response()->json($faction);
    }
}
