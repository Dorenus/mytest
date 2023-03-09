<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

     const SORT = [
    
        'asc_price' => 'Name A-Z',
        'desc_price' => 'Name Z-A',
        
    ];

    public function mealsMenu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    // public function mealsMenu()
    // {
    //     return $this->belongsTo(Menu::class, 'menu_id', 'id');
    // }




    public function mealRatings()
    {
        return $this->hasMany(Rating::class, 'meal_id', 'id');
    }
}
