<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weapon;
use App\Http\Resources\WeaponResource;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weapons = Weapon::get();
        return response()->json(WeaponResource::collection($weapons));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $weapon = Weapon::create($request->all());
        return response()->json($weapon);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $weapon = Weapon::findOrFail($id);
        return response()->json(new WeaponResource($weapon));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $weapon = Weapon::where('id',$id)
        ->update($request->all());
        $weapon = Weapon::findOrFail($id);     
        return response()->json($weapon);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $weapon = Weapon::find($id);
        $weapon->delete();
        return response()->json($weapon);
    }
}
