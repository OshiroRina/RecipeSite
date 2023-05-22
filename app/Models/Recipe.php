<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'information',
        'text',
        'secondary_category_id',
        'image',
        'ingredient1',
        'ingredient2',
        'ingredient3',
        'ingredient4',
        'ingredient5',
        'ingredient6',
        'ingredient7',
        'ingredient8',
        'ingredient9',
        'delete_flag',
        'created_at'
    ];

    public function secondary_category()
    {
        return $this->belongsTo(SecondaryCategory::class);
    }

    public function recipe_details()
    {
        return $this->hasMany(RecipeDetail::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // カテゴリー検索
    public function scopeSearchCategory($query, $search_category = null)
    {
         if(!empty($search_category)){
            return $query->where('secondary_category_id','=', $search_category);
         }
     }

    // ワード検索
     public function scopeSearchWord($query, $search_word = null)
    {
         if(!empty($search_word)){
            return $query->where('recipes.name', 'like', '%'. $search_word . '%');
         }
     }
}
