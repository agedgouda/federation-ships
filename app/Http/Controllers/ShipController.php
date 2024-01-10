<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
use App\Http\Resources\ShipResource;

class ShipController extends Controller
{
    public function index() {
        $ships = Ship::with('faction', 'weapons', 'class')
        ->get();
        return ShipResource::collection($ships);
    }
    
    public function show(int $id) {
        $ship = Ship::with('faction', 'weapons', 'class')->findOrFail($id);
        return new ShipResource($ship);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ship = Ship::with('weapons')->findOrFail($request->ship_class_id);
        unset($ship->created_at);
        unset($ship->updated_at);
        unset($ship->id);
        $ship->name = $request->name;
        $ship->ship_class_id = $request->ship_class_id;
        $ship->registry = $request->registry;

        //$weapons = $ship->weapons();
        //unset($ship->weapons);

        foreach ($ship->weapons as $weapon) {
            echo "{$weapon->pivot}<br>";
            //echo "Weapon ID: {$weapon->id}<br>";
            //echo "Arc: {$weapon->pivot->arc}<br>"; // Access pivot data
            //echo "Location: {$weapon->pivot->location}<br><br>";
        }
        //$newShip = Ship::create($ship->toArray());
        //$newShip->weapons()->attach($weapons);
        return response()->json($weapon);
    }    
    
    /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
       //echo json_encode($request->ship);
       echo json_encode($request->weapons);
        $ship = Ship::where('id',$id)
            ->update($request->ship);
        $ship = Ship::findOrFail($id);
        $ship->weapons()->attach($request->weapons);
        echo json_encode($ship->weapons());    
       // return response()->json($ship);
   }
    
    public function getClassShips(int $id) {
        $ships = Ship::with('faction', 'weapons', 'class')
        ->where('ship_class_id',1)
        ->get();
        return ShipResource::collection($ships);
    }
   
    public function getFactionShips(int $id) {
        $ships = Ship::with('faction', 'weapons', 'class')
        ->where('faction_id',$id)
        ->get();
        return ShipResource::collection($ships);
    }

    /*****
     * 
     * Classes of Ships
     * ship_class_id is null for classes
     * 
     *****/

    public function classIndex() {
        $ships = Ship::with('faction', 'weapons')
        ->whereNull('ship_class_id')
        ->get();
        return ShipResource::collection($ships);
    }

    public function getFactionShipClasses(int $id) {
        $ships = Ship::with('faction', 'weapons')
        ->whereNull('ship_class_id')
        ->where('faction_id',$id)
        ->get();
        return ShipResource::collection($ships);
    }
}
