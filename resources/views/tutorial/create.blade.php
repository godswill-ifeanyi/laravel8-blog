@extends('layouts.app')

@section('content')

    <!--Blog Section-->
    <main id="main">
    
        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
          <div class="container" data-aos="fade-up">
            <h2>Create Tutorial</h2>

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
                    <form action="/tutorial" method="post" enctype="multipart/form-data">
                        @csrf
    
                        <input type="text" placeholder="Title" name="title" class="form-control mb-4">

                        <input type="number" placeholder="Price" name="price" class="form-control">
    
                        <textarea name="small_description" cols="30" rows="3" placeholder="Small Description" class="form-control my-4"></textarea>

                        <textarea name="description" cols="30" rows="7" placeholder="Description" class="form-control my-4"></textarea>
    
                        <div>
                            <label>Select a photo:</label>
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