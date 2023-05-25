<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'primary_category_id',
        'name',
        'sort_order',
        'created_at'
    ];

    public function primary_category()
    {
        return $this->belongsTo(PrimaryCategory::class);
    }

}
