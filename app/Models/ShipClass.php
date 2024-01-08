<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class ShipClass extends Ship
{
    protected static function booted()
    {
        parent::booted();

        static::addGlobalScope('nullClass', function (Builder $builder) {
            $builder->whereNull('ship_class_id');
        });
    }

    // Override the table name
    protected $table = 'ships'; // Specify the table name for ShipClass model

    // Override the getTable method to return the base model's table name
    public function getTable()
    {
        return (new Ship())->getTable();
    }
}
