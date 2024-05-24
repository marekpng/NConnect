<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $table = 'speakers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'company_name',
        'image',
        'short_description',
        'long_description',
        'social_media_links',
    ];

    protected $casts = [
        'social_media_links' => 'array', // Casting social media links as an array
    ];
}
