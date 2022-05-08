<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name',
        'description',
        'price',
        'available',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function scopeSearch(Builder $query): Builder
    {
        return $query->when(request()->filled('search'), function ($query) {
            $query->where('name', 'like', '%' . request()->query('search') . '%')
                ->orWhere('description', 'like', '%' . request()->query('search') . '%');
        });
    }
}
