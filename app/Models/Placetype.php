<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Placetype extends Model
{
    protected $fillable = [];
    public $timestamps = false;

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

}
