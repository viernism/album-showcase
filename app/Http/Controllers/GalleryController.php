<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class GalleryController extends Controller
{
    public function index (Request $request) 
    {
        $gallery = Gallery::all();
        return view('pages.home', compact('gallery'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'desc' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();

        // store the original image
        $originalImagePath = $image->storeAs('img/original', $imageName, 'public');

        // crop the img to 160x160
        $croppedImage = Image::make(public_path('storage/' . $originalImagePath))
            ->fit(160, 160);

        // generate cropped image name
        $croppedImageName = 'cropped_' . $imageName;

        // store the cropped image
        $croppedImagePath = $croppedImage->save(public_path('storage/img/cropped/' . $croppedImageName));

        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->desc = $request->desc;
        $gallery->photo = 'img/cropped/' . $croppedImageName;
        $gallery->save();

        return redirect()->back()->with('success', 'Data added successfully!');
    }

    public function update(Request $request, $galleryId)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $gallery = Gallery::find($galleryId);
        if (!$gallery) {
            return redirect()->back()->with('error', 'Gallery not found.');
        }

        $gallery->title = $request->title;
        $gallery->desc = $request->desc;

        if ($request->hasFile('image')) {
            // delete old image
            Storage::disk('public')->delete($gallery->photo);

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();

            // store the original image
            $originalImagePath = $image->storeAs('img/original', $imageName, 'public');

            // crop image to 160x160
            $croppedImage = Image::make(public_path('storage/' . $originalImagePath))
                ->fit(160, 160);

            // generate cropped image name
            $croppedImageName = 'cropped_' . $imageName;

            // store the cropped image
            $croppedImagePath = $croppedImage->save(public_path('storage/img/cropped/' . $croppedImageName));

            $gallery->photo = 'img/cropped/' . $croppedImageName;
        }

        $gallery->save();

        return redirect()->back()->with('success', 'Gallery updated successfully.');
    }



    public function delete($galleryId) 
    {
        $gallery = Gallery::find($galleryId);
        if (!$gallery) {
            return redirect()->back()->with('error', 'Gallery not found.');
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery deleted successfully.');
    }
}


// idk if this gon work
// use Intervention\Image\Facades\Image;

// public function store(Request $request)
// {
//     $validatedData = $request->validate([
//         'title' => 'required',
//         'desc' => 'nullable',
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
//     ]);

//     $image = $request->file('image');
//     $imagePath = $this->storeAndCropImage($image);

//     $gallery = new Gallery;
//     $gallery->title = $request->title;
//     $gallery->desc = $request->desc;
//     $gallery->photo = $imagePath;
//     $gallery->save();

//     return redirect()->back()->with('success', 'Data added successfully!');
// }

// public function update(Request $request, $galleryId)
// {
//     $request->validate([
//         'title' => 'required',
//         'desc' => 'nullable',
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
//     ]);

//     $gallery = Gallery::find($galleryId);
//     if (!$gallery) {
//         return redirect()->back()->with('error', 'Gallery not found.');
//     }

//     $gallery->title = $request->title;
//     $gallery->desc = $request->desc;

//     if ($request->hasFile('image')) {
//         // delete the old image
//         Storage::disk('public')->delete($gallery->photo);

//         // store the new image
//         $image = $request->file('image');
//         $imagePath = $this->storeAndCropImage($image);
//         $gallery->photo = $imagePath;
//     }

//     $gallery->save();

//     return redirect()->back()->with('success', 'Gallery updated successfully.');
// }

// private function storeAndCropImage($image)
// {
//     $imageName = time().'.'.$image->getClientOriginalExtension();
//     $imagePath = $image->storeAs('img', $imageName, 'public');

//     // crop image to 300x300
//     $croppedImage = Image::make(public_path('storage/' . $imagePath))
//         ->fit(300, 300)
//         ->save();

//     return $imagePath;
// }
