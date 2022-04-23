<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $casts = [
        'ingredients' => 'array'
    ];

    protected $fillable = [
        'user_id',
        'title',
        'image',
        'fat',
        'carbs',
        'protein',
        'calories',
        'ready_in_minutes',
        'instructions',
        'ingredients',
        'dish_types'

    ];

    public function scopeSearchRecipe($query, $value)
    {
        return $query->when(!is_null($value), function ($query) use ($value) {
            $query->where('title', 'like', '%' . $value . '%')
                ->orWhere('dish_types', 'like', '%' . $value . '%');
        });
    }
    public function setIngredientsAttribute($value)
    {
        $this->attributes['ingredients'] = json_encode($value);
    }

    public function getImageUrlAttribute()
    {
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        } else {
            if (app()->environment('production')) {
                return $this->image ? Storage::disk('s3')->url('images/recipes/' . $this->image) : null;
            } else {
                return $this->image ? asset('storage/images/recipes/' . $this->image) : null;
            }
        }
    }
}