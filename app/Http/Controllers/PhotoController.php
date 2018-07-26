<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Rating;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function likePhoto($id, $mark) {
        $picture = Picture::find($id);
        $picture->ratings()->save(new Rating(['mark' => $mark == 1]));
        $place = Picture::find($id)->place;

        return redirect()->route('place.show', [$place->id]);
    }
}
