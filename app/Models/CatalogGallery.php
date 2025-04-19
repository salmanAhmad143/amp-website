<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalog_id',
        'actual_path',
        'resize_path',
        'type'
    ];
}
