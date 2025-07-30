<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemMovement extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'warehouse_id', 'type', 'quantity'];

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function warehouse() {
        return $this->belongsTo(Warehouse::class);
    }
}
