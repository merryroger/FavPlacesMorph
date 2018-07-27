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

    public function getLikes()
    {
        return $this->ratings()->where('mark', true)->count();
    }

    public function getDisLikes()
    {
        return $this->ratings()->where('mark', false)->count();
    }

    public function calcRating()
    {
        $pictRating = 0;
        $pictures = $this->pictures()->get();
        foreach ($pictures as $picture) {
            $pictRating += $picture->calcRating();
        }

        $placeRating = $this->getLikes() - $this->getDisLikes();
        return $placeRating + $pictRating;
    }

}
