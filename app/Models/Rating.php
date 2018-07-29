<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['id', 'mark', 'rateable_id', 'rateable_type', 'created_at', 'updated_at'];

    public function rateable()
    {
        return $this->morphTo();
    }

    public function scopeLikes($query)
    {
        return $query->where('mark', true);
    }

    public function scopeDisLikes($query)
    {
        return $query->where('mark', false);
    }

}
