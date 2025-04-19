<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'thumbnail',
        'description',
        'status',
    ];

    public function scopePublished(Builder $query)
    {
        return $query->where('status', 1);
    }

    public function getThumbnailAttribute($thumbnail)
    {
        return $thumbnail ? asset("uploads/blogPost/{$thumbnail}") : asset('assets/admin/img/default.jpg');
    }

    public function getShortDescriptionAttribute()
    {
        $allowed = '<strong><em><a><b><i>';
        $desc = strip_tags($this->description, $allowed);
        return mb_strimwidth($desc, 0, 100, '...');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
