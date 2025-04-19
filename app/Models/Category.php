<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\CatalogCategory;

class Category extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'name',
        'slug',
        'keyword',
        'description',
        'status',
    ];

    public function scopeActive(Builder $query)
    {
        return $query->where('status', 1);
    }

    public function cms()
    {
        return $this->hasMany(Cms::class);
    }

    public function catalog()
    {
        return $this->hasMany(CatalogCategory::class);
    }
}
