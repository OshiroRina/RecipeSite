<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'explanation',
        'recipe_id',
        'image1',
        'image2',
        'delete_flag',
        'created_at'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
