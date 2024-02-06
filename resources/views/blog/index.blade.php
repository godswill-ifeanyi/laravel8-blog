@extends('layouts.app')

@section('content')

    <!--Blog Section-->
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
          <div class="container">
            <h2>Blogs</h2>
            <p>
    
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    
            </p><br><br>
    
    
            <p>
              
    
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    
            </p>
          </div>
        </div><!-- End Breadcrumbs -->
    
        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
          <div class="container" data-aos="fade-up">

            @if (session()->has('message'))
                <div class="alert alert-success auto-close">
                  {{session()->get('message')}}
                </div>
            @endif

            @if (Auth::check())
                <div class="btn btn-light border border-success outline-red my-5">
                  <a class="text-success" href="/blog/create">Add New Blog</a>
                </div>
            @endif
    
            <div class="row">
              @foreach ($posts as $post)
                <div class="col-md-6 d-flex align-items-stretch">
                  <div class="card">
                    <div class="card-img">
                      <img src="{{asset('images/'.$post->image_path)}}" alt="...">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><a href="/blog/{{$post->slug}}">{{$post->title}}</a></h5>
                      <p class="fst-italic text-center">
                        <span>By <b>{{$post->user->name}}</b>,</span> Created on {{date('jS M Y',strtotime($post->updated_at))}}</p>
                      <p class="card-text">{{$post->description}}</p>
                      <a href="/blog/{{$post->slug}}" class="btn btn-light border border-success text-success">KEEP READING</a>
                      
                      @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                      <span class="float-right mt-4 d-block">
                        <a href="/blog/{{$post->slug}}/edit" class="btn btn-light fst-italic">Edit</a>
                      </span>

                      <span class="float-right" onclick="return confirm('Are you sure to delete this post?')">
                        <form action="/blog/{{$post->slug}}" method="post">
                        @csrf
                        @method('delete')

                          <button class="btn btn-light text-danger fst-italic" type="submit">Delete</button>
                        </form>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
    
              @endforeach
            </div>
          </div>
        </section><!-- End Events Section -->
    
    
      </main><!-- End #main -->
      <!--End Blog-->

@endsection