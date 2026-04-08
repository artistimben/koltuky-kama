<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    protected $fillable = ['name', 'description', 'price', 'unit', 'features', 'featured', 'active', 'order'];

    protected $casts = ['features' => 'array', 'featured' => 'boolean', 'active' => 'boolean', 'price' => 'decimal:2'];

    public function scopeActive($query)
    {
        return $query->where('active', true)->orderBy('order');
    }
}
