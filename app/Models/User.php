<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function myRecipes()
    {
        return  $this->hasMany(Recipe::class, 'user_id');
    }
    public function myFavRecipes()
    {
        return  $this->belongsToMany(Recipe::class, 'my_favorite_recipes');
    }
    public function myFavRecipesHas($recipeId)
    {
        return  $this->myFavRecipes()->where('recipe_id', $recipeId)->exists('recipe_id');
    }


    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
        }
    }
    public function getAvatarUrlAttribute()
    {
        if (is_null($this->avatar)) {
            return asset('assets/images/avatar_male.png');
        } else {


            if (app()->environment('production')) {
                return $this->avatar ? Storage::disk('s3')->url('images/avatars/' . $this->avatar) : null;
            } else {
                return $this->avatar ? asset('storage/images/avatars/' . $this->avatar) : null;
            }
        }
    }
}