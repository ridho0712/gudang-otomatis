<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location'];

    public function itemMovements() {
        return $this->hasMany(ItemMovement::class);
    }
}
