<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalog_id',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class)->where('status', 1);
    }
}
