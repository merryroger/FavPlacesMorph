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
        return $this->ratings()->likes()->count();
    }

    public function getDisLikes() {
        return $this->ratings()->disLikes()->count();
    }

    public function calcRating() {
        return $this->getLikes() - $this->getDisLikes();
    }

}
