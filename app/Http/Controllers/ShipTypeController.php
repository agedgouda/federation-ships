<?php

namespace App\Http\Controllers;

use App\Models\ShipType;
use Illuminate\Http\Request;

class ShipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ShipTypes = ShipType::get();
        return response()->json($ShipTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ShipType = ShipType::create($request->all());
        return response()->json($ShipType);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ShipType = ShipType::findOrFail($id);
        return response()->json($ShipType);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ShipType = ShipType::where('id',$id)
        ->update($request->all());
        $ShipType = ShipType::findOrFail($id);     
        return response()->json($ShipType);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ShipType = ShipType::find($id);
        $ShipType->delete();
        return response()->json($ShipType);
    }
}

