<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipResource extends JsonResource
{
    public function toArray($request)
    {

        $faction = new FactionResource($this->whenLoaded('faction'));
        
        
        if($this->ship_class_id) {
            $ship_class = $this->class->name;
        } else {
            $ship_class = "Lead ship";
        }


        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'ship_class' => $ship_class,
            'ship_class_id' => $this->ship_class_id,
            'faction_name' => $faction->name,
            'faction_logo' => $faction->logo_url,
            'registry' => $this->registry,
            'faction_identifier' => $faction->identifier,
            'ship_image_url' => $this->ship_image_url,
            'ship_counter_url' => $this->ship_counter_url,
            'type' => $this->shipType->name,
            'typeAbbreviation' => $this->shipType->abbreviation,
            'power' => $this->power,
            'aux' => $this->aux,
            'battery' => $this->battery,
            'bridge' => $this->bridge,
            'f_hull' => $this->f_hull,
            'c_hull' => $this->c_hull,
            'l_hull' => $this->l_hull,
            'r_hull' => $this->r_hull,
            'r_hull' => $this->f_hull,
            'c_warp' => $this->c_warp,
            'l_warp' => $this->l_warp,
            'r_warp' => $this->r_warp,
            'shield_1' => $this->shield_1,
            'shield_2' => $this->shield_2,
            'shield_3' => $this->shield_3,
            'shield_4' => $this->shield_4,
            'shuttle_bays' => $this->shuttle_bays,
            'impulse_engine' => $this->impulse_engine,
            'lab' => $this->lab,
            'drone_rack' => $this->drone_rack,
            'emergency_bridge' => $this->emergency_bridge,
            'power_reactor' => $this->power_reactor,
            'frame_damage' => $this->frame_damage,
            'transporter' => $this->transporter,
            'tractor_beam' => $this->tractor_beam,
            'impulse' => $this->impulse,
            'anti_drone' => $this->anti_drone,
            'turn_mode' => $this->turn_mode,
            'base_8_turn_mode' => $this->base_8_turn_mode,
            'base_8_turn_cost' => $this->base_8_turn_cost,
            'base_16_turn_mode' => $this->base_16_turn_mode,
            'base_16_turn_cost' => $this->base_16_turn_cost,
            'base_24_turn_mode' => $this->base_24_turn_mode,
            'base_24_turn_cost' => $this->base_24_turn_cost,
            'acceleration_cost' => $this->acceleration_cost,
            'deceleration_cost' => $this->deceleration_cost,
            'weapons' => WeaponResource::collection($this->whenLoaded('weapons')),
        ];

        return $data;
    }
}
