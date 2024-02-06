@extends('layouts.app')

@section('content')

    <!--Blog Section-->
    <main id="main">
    
        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
          <div class="container" data-aos="fade-up">
            <h2>Update Post</h2>

            @if ($errors->any())
                <div class="alert alert-danger auto-close">
                    <ul class="list-group-">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row mt-5">
                <div class="col-md-6">
                    <form action="/blog/{{$post->slug}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
    
                        <input type="text" placeholder="Title..." value="{{$post->title}}" name="title" class="form-control">
    
                        <textarea name="description" cols="30" rows="7" placeholder="Description" class="form-control my-4">{{$post->description}}</textarea>
    
                        <div class="card">
                            <div class="card-img mt-2">
                                <span>Old Photo:</span>
                                <img src="{{asset('images/'.$post->image_path)}}" alt="...">
                                <input type="hidden" name="oldimage" value="{{$post->image_path}}">
                              </div>
                        </div>

                        <div>
                            <label>Select a new photo:</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        
                        <button type="submit" class="btn btn-light border border-success text-success mt-4 mb-2 float-right">Sumbit Post</button>
    
                    </form>
                </div>
            </div>

          </div>
        </section><!-- End Events Section -->
    
      </main><!-- End #main -->
      <!--End Blog-->

@endsection