<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

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

    $imagePath = $request->file('image')->store('img', 'public');

    $gallery = new Gallery;
    $gallery->title = $request->title;
    $gallery->desc = $request->desc;
    $gallery->photo = $imagePath;
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
            // delete the old image lol
            Storage::disk('public')->delete($gallery->photo);
        
            // store the new image coz kool>:)
            $imagePath = $request->file('image')->store('img', 'public');
            $gallery->photo = $imagePath;
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
