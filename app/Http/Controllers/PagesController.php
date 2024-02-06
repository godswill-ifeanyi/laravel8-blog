<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('index')
        ->with('posts', Post::orderBy('updated_at', 'DESC')->take(5)->get())
        ->with('tutorials', Tutorial::orderBy('updated_at', 'DESC')->take(3)->get());
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }
}
