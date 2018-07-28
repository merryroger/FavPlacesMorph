<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Rating;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function likePhoto($id, $mark)
    {
        $picture = Picture::find($id);
        $picture->ratings()->create(['mark' => $mark == 1]);
        $place = Picture::find($id)->place;

        $_response = [
            'target' => 'photo',
            'id' => $id,
            'likes' => $picture->getLikes(),
            'dislikes' => $picture->getDisLikes(),
            'rating' => $picture->calcRating(),
            'placerating' => $place->calcRating()];

        return response()->json($_response, 200);
    }

}
