<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\CatalogGallery;
use App\Models\Catalog;
use App\Models\User;

class Showcase extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'catalog_id',
        'phone',
        'expiration_date',
        'catalog_gallery_id',
        'position',
        'status'
    ];

    // public function getImagePathAttribute($image_path)
    // {
    //     return $image_path ? asset("uploads/{$image_path}") : asset('assets/admin/img/default.jpg');
    // }
    
    public function scopeActive(Builder $query)
    {
        return $query->where('status', 1);
    }

    public function catalogGallery()
    {
        return $this->belongsTo(CatalogGallery::class);
    }

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id', 'id');
    }
}
