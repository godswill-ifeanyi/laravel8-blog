@extends('layouts.app')

@section('content')

    <!--Blog Section-->
    <main id="main">
    
        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
          <div class="container mt-3" data-aos="fade-up">
            <h2>{{$tutorial->title}}</h2>

            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{asset('images/'.$tutorial->image_path)}}" alt="...">
                          </div>
                    </div>

                    <h3>&#8358;{{$tutorial->price == 0 ? "Free" : $tutorial->price}}</h3>

                    <span class="fst-italic">By <b>{{$tutorial->user->name}}</b>, Created on {{date('jS M Y',strtotime($tutorial->updated_at))}}</span></p>
                    
                    <p>{{$tutorial->small_description}}</p>
                    <p>{{$tutorial->description}}</p>
                </div>
            </div>

          </div>
        </section><!-- End Events Section -->
    
      </main><!-- End #main -->
      <!--End Blog-->

@endsection