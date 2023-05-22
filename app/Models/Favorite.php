<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recipe_id',
        'created_at'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
