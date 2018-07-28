<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['id', 'place_id', 'location', 'width', 'height', 'created_at', 'updated_at'];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    public function getLikes() {
        return $this->ratings()->likes(true)->count();
    }

    public function getDisLikes() {
        return $this->ratings()->likes(false)->count();
    }

    public function calcRating() {
        return $this->getLikes() - $this->getDisLikes();
    }

}
