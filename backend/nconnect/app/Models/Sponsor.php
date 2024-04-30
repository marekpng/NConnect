<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    use HasFactory;
    protected $fillable = [
        'name', 'about', 'job', 'socialmedia', 'image',
    ];
}
