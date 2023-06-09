<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Message;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user){
            abort(401);
        }
        $galleries = $user->galleries;
        return view('gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'place' => 'required|string',
            'date' => 'required|date',
        ]);
        $user = Auth::user();
        $image = $request->file('image')->store('images','public');
        $user->galleries()->create([
            'image' => $image,
            'place' => $request->place,
            'datehappen' => $request->date
        ]);
        return back()->with('success', 'Image uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            abort(404); // Or handle the error as desired
        }

        return view('gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            abort(404); // Or handle the error as desired
        }

        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $request->validate([
            'place' => 'required|string',
            'datehappen' => 'required|date',
        ]);
        $gallery->update($request->only('place','datehappen'));
        if(!$gallery){
            return back();
        }
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            abort(404); // Or handle the error as desired
        }
        $gallery->delete();
        return $this->index();
    }
}
