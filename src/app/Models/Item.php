<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'description',
    ];

    public function itemMovements(): HasMany    
    {
        return $this->hasMany(ItemMovement::class);
    }

    protected static function booted()
    {
        static::creating(function ($item) {
            if (empty($item->sku)) {
                $item->sku = 'SKU-' . strtoupper(uniqid());
            }
        });
    }
}
