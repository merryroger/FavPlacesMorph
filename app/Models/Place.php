<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['id', 'placetype_id', 'name'];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function placetypes()
    {
        return $this->hasMany(Placetype::class);
    }

    public function scopePlaceById($query, $id)
    {
        return $query->whereId($id);
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

}
