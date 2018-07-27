<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use App\Models\Place;

class RatingController extends Controller
{
    public function index()
    {
        $listset = Place::all();
        $rates = [];
        foreach ($listset as $lid => $item) {
            $rates[$lid] = $item->calcRating();
        }

        arsort($rates);

        $photoset = Picture::all();
        $ph_rates = [];
        foreach ($photoset as $lid => $item) {
            $ph_rates[$lid] = $item->calcRating();
        }

        arsort($ph_rates);

        return view('ratings', compact('listset', 'rates', 'photoset', 'ph_rates'));
    }
}
