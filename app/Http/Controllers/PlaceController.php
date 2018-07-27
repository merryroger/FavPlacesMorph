<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Placetype;
use App\Models\Picture;
use App\Models\Rating;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PlaceRequest;
use App\Http\Requests\PictureRequest;

class PlaceController extends Controller
{

    public function placeList()
    {
        $listset = Place::all();
        $placetypes = Placetype::all();
        $types = [];

        foreach ($placetypes as $pt) {
            $types[$pt->id] = $pt->name;
        }

        return view('placelist', compact('listset', 'types'));
    }

    public function addPlace()
    {
        $types = Placetype::all();

        return view('addplace', compact('types'));
    }

    public function doAddPlace(PlaceRequest $request)
    {
        $newplace = $request->only('name', 'placetype_id');
        Place::create($newplace);

        return redirect()->route('place.show_all');
    }

    public function showPlace($id)
    {
        $place = Place::placeById($id)->first();
        $listset = $place->pictures->sortByDesc(function ($query) {
            return $query->created_at;
        });

        return view('showplace', compact('place', 'listset'));
    }

    public function addPhoto(Request $request, $id)
    {
        $referer = $request->server('HTTP_REFERER');
        $place = Place::placeById($id)->first();
        $places = Place::all();

        return view('add_linked_photo', compact('places', 'place', 'referer'));
    }

    public function addAnyPhoto()
    {
        $places = Place::all();
        return view('add_wildcard_photo', compact('places'));
    }

    public function doAddPhoto(PictureRequest $request)
    {
        $file = $request->file('image');
        $path = $file->storeAs('collection', $file->getClientOriginalName(), 'public');
        list($width, $height) = getimagesize(storage_path('app/public') . "/{$path}");

        $location = Storage::url($path);

        $place_id = intval($request->input('place_id'));

        Picture::create(['place_id' => $place_id, 'location' => $location, 'width' => $width, 'height' => $height]);

        return redirect("places/{$place_id}/");
    }

    public function likePlace($id, $mark)
    {
        $place = Place::find($id);
        $place->ratings()->save(new Rating(['mark' => $mark == 1]));

        return redirect()->route('place.show', [$id]);
    }

}

