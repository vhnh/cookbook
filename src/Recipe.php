<?php

namespace Vhnh\Cookbook;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $casts = [
        'ingredients' => 'array',
    ];

    public function scopeWithIngredients($query, $ingredients)
    {
        return $query->whereJsonContains('ingredients', $ingredients);
    }
}
