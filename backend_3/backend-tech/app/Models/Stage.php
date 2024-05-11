<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $table = 'stages';
    protected $fillable = [
        'date', 'time', 'title', 'description', 'presenter', 'organization', 'image'
    ];
}
