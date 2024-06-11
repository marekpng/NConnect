<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSite extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'myFile', 'path'];

    // Accessor to decode the content from blob
    public function getMyFileAttribute($value)
    {
        return $value ? base64_decode($value) : null;
    }

    // Mutator to encode the content to blob
    public function setMyFileAttribute($value)
    {
        $this->attributes['myFile'] = $value ? base64_encode($value) : null;
    }
}

