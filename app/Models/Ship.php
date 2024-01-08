<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ship extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shipType(): BelongsTo {
        return $this->belongsTo(ShipType::class);
    }

    public function faction(): BelongsTo {
        return $this->belongsTo(Faction::class);
    }

    public function class(): BelongsTo {
        return $this->belongsTo(Ship::class, 'ship_class_id');
    }
    public function weapons(): BelongsToMany {
        return $this->belongsToMany(Weapon::class)->withPivot('arc', 'location');;
    }

}
