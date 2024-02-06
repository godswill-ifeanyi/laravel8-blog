@extends('layouts.app')

@section('content')

    <!--Blog Section-->
    <main id="main">
    
        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
          <div class="container mt-3" data-aos="fade-up">
            <h2>{{$post->title}}</h2>

            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{asset('images/'.$post->image_path)}}" alt="...">
                          </div>
                    </div>

                    <span class="fst-italic">By <b>{{$post->user->name}}</b>, Created on {{date('jS M Y',strtotime($post->updated_at))}}</span></p>
                    
                    <p>{{$post->description}}</p>
                </div>
            </div>

          </div>
        </section><!-- End Events Section -->
    
      </main><!-- End #main -->
      <!--End Blog-->

@endsection