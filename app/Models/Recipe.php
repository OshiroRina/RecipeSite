<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'information',
        'text',
        'secondary_category_id',
        'image',
        'delete_flag',
        'created_at'
    ];
}
