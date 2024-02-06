@extends('layouts.app')

@section('content')
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

        @if (session()->has('message'))
            <div class="alert alert-success auto-close">
                {{session()->get('message')}}
            </div>
        @endif

        @if (Auth::check())
            <div class="btn btn-light border border-success outline-red my-5">
            <a class="text-success" href="/tutorial/create">Add New Tutorial</a>
            </div>
        @endif

      <div class="row mt-5" data-aos="zoom-in" data-aos-delay="100">

        @foreach ($tutorials as $tutorial)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
                <a href="/tutorial/{{$tutorial->slug}}">
                    <img src="{{asset('images/'.$tutorial->image_path)}}" class="img-fluid" alt="...">
                </a>
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>{{$tutorial->user->name}}</h4>
                  <p class="price">&#8358;{{$tutorial->price == 0 ? "Free" : $tutorial->price}}</p>
                </div>
  
                <h3><a href="/tutorial/{{$tutorial->slug}}">{{$tutorial->title}}</a></h3>
                <p>{{$tutorial->small_description}}</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                    @if (isset(Auth::user()->id) && Auth::user()->id == $tutorial->user_id)
                    <span class="d-block">
                      <a href="/tutorial/{{$tutorial->slug}}/edit" class="btn btn-light fst-italic">Edit</a>
                    </span>

                    <span class="float-right" onclick="return confirm('Are you sure to delete this tutorial?')">
                      <form action="/tutorial/{{$tutorial->slug}}" method="post">
                      @csrf
                      @method('delete')

                        <button class="btn btn-light text-danger fst-italic" type="submit">Delete</button>
                      </form>
                    </span>
                    @endif
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
        @endforeach

      </div>

    </div>
  </section><!-- End Popular Courses Section -->
@endsection