<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TutorialsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tutorial.index')->with('tutorials', Tutorial::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutorial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' .$request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $slug = SlugService::createSlug(Tutorial::class, 'slug', $request->title);

        Tutorial::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'small_description' => $request->input('small_description'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/tutorial')->with('message', 'Your tutorial has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('tutorial.show')->with('tutorial', Tutorial::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('tutorial.edit')->with('tutorial', Tutorial::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'small_description' => 'required',
            'description' => 'required',
        ]);

        $imageName = $request->image;

        if (isset($imageName)) {
            $newImageName = uniqid() . '-' . $request->title . '.' .$request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        } else {
            $newImageName = $request->oldimage;
        }

        Tutorial::where('slug', $slug)->update([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'small_description' => $request->input('small_description'),
            'slug' => $slug,
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/tutorial')->with('message', 'Your tutorial has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $tutorial = Tutorial::where('slug', $slug);
        $tutorial->delete();

        return redirect('/tutorial')->with('message', 'Your tutorial has been deleted!');
    }
}
