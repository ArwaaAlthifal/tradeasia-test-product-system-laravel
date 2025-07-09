<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'hs_code',
        'cas_number',
        'image',
        'description',
        'application',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'application' => 'array',
        'meta_title' => 'array',
        'meta_keyword' => 'array',
        'meta_description' => 'array',
    ];
}