<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    private $images;

    public function __construct(ImageService $imageService)
    {
        $this->images = $imageService;
    }

    function index() {
        $myImages = $this->images->all();
        return view('welcome', ['imagesInView' => $myImages]);
    }


    function create() {
        return view('create');
    }

    function store(Request $request) {
        $image = $request->file('image');
        $filename = $image->store('uploads');

        $this->images->add($filename);

        return redirect('/');
    }

    function show($id) {
        $image = $this->images->one($id);

        return view('show', ['imageInView' => $image]);
    }

    function edit($id) {
        $image = $this->images->one($id);

        return view('edit', ['imageInView' => $image]);
    }

    function update(Request $request, $id) {
        $image = $this->images->one($id);

        Storage::delete($image->image);

        $imageNew = $request->file('image');
        $filename = $imageNew->store('uploads');

        $this->images->update($id, $filename);

        return redirect('/');
    }

    function delete($id) {
        $image = $this->images->one($id);

        Storage::delete($image->image);

        $this->images->delete($id);

        return redirect('/');
    }
}
