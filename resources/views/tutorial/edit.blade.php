@extends('layouts.app')

@section('content')

    <!--Blog Section-->
    <main id="main">
    
        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
          <div class="container" data-aos="fade-up">
            <h2>Update Tutorial</h2>

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
                    <form action="/tutorial/{{$tutorial->slug}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
    
                        <input type="text" placeholder="Title..." value="{{$tutorial->title}}" name="title" class="form-control mb-4">

                        <input type="number" placeholder="Price" value="{{$tutorial->price}}" name="price" class="form-control">
    
                        <textarea name="small_description" cols="30" rows="3" placeholder="Small Description" class="form-control my-4">{{$tutorial->small_description}}</textarea>

                        <textarea name="description" cols="30" rows="7" placeholder="Description" class="form-control my-4">{{$tutorial->description}}</textarea>
    
                        <div class="card">
                            <div class="card-img mt-2">
                                <span>Old Photo:</span>
                                <img src="{{asset('images/'.$tutorial->image_path)}}" alt="...">
                                <input type="hidden" name="oldimage" value="{{$tutorial->image_path}}">
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