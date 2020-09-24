<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $appends = ['sections'];


    public function session()
    {
        return $this->belongsTo(Session::class);
    }


    public function getSectionsAttribute()
    {
        // Normalize new lines
        $lyrics = str_replace("\r\n", "\n", $this->lyrics);

        $sections = explode("\n\n", $lyrics);

        return $sections;
    }
}
