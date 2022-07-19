<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('home', compact('galleries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "images" => "required",
            "images.*" => "mimes:png,jpg,jpeg,gif"
        ]);

        if ($validated) {
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                foreach ($images as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    Storage::put('uploads/' . $imageName, file_get_contents($image));

                    $gallery = new Gallery();
                    $gallery->name = $imageName;

                    $gallery->save();
                }
                return back()->with('success', 'File Upload Success!');
            }
        }else {
            return back()->with('error', 'Validation error!');
        }
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        Storage::delete('uploads/' . $gallery->name);
        $gallery->delete();

        return back();
    }

    public function download($id)
    {
        $gallery = Gallery::findOrFail($id);

        return Storage::download('uploads/' . $gallery->name);
    }

}
