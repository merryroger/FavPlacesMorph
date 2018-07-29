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
        return $this->ratings()->likes()->count();
    }

    public function getDisLikes()
    {
        return $this->ratings()->disLikes()->count();
    }

    public function calcRating()
    {
        $pictRatings = $this->pictures()->get()->map->calcRating()->sum();
        $placeRating = $this->getLikes() - $this->getDisLikes();

        return $placeRating + $pictRatings;
    }

}
