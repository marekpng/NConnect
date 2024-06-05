<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'name', 'date', 'time', 'title', 'description', 'presenter', 'organization', 'image', 'capacity'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'stage_user');
    }
}
