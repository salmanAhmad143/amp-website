<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\CatalogTag;

class Tag extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'user_id',
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

    public function setNamettribute($value)
    {
        $this->attributes['slug'] = strSlug($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function catalog()
    {
        return $this->hasMany(CatalogTag::class);
    }
}
