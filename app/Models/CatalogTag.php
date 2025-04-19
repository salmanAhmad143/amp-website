<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class CatalogTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalog_id',
        'tag_id'
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class)->where('status', 1);
    }
}
