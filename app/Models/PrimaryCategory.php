<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sort_order',
        'created_at'
    ];

    public function secondary_categories()
    {
        return $this->hasMany(SecondaryCategory::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
