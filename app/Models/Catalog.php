<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\CatalogGallery;
use App\Models\CatalogTag;
use App\Models\CatalogCategory;

class Catalog extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'name',
        'phone',
        'slug',
        'description',
        'phone_status',
        'status',
    ];

    public function scopeActive(Builder $query)
    {
        return $query->where('status', 1);
    }

    public function catalogGallery()
    {        
        return $this->hasMany(CatalogGallery::class);
    }

    public function catalogTag()
    {
        return $this->hasMany(CatalogTag::class)
            ->whereHas('tag', function ($query) {
                $query->where('status', 1);
            });
    }

    public function catalogCategory()
    {
        return $this->hasMany(CatalogCategory::class)
        ->whereHas('category', function ($query) {
            $query->where('status', 1);
        });
    }

    public function showcase()
    {
        return $this->hasOne(Showcase::class, 'catalog_id', 'id');
    }
}
