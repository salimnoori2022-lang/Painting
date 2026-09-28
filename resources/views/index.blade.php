

@extends('layouts.master')

@section('content')

                     @if(Session('app_added'))
                        <div class="alert alert-success page-alert" role="alert">
                          {{Session('app_added')}}
                         
                        </div>
                      @endif
                       @if(Session('post_deleted'))
                        <div class="alert alert-success page-alert" role="alert">
                          {{Session('post_deleted')}}
                         
                        </div>
                      @endif
     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Let's make your house looks beutifull</h3>
                                             <h1>Awesome Look</h1>
                                             <a href="#about" class="section-btn btn btn-default smoothScroll">More About Us</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Great Experience</h3>
                                             <h1>Expert Painter</h1>
                                             <a href="#news" class="section-btn btn btn-default btn-gray smoothScroll">Services</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>We Don't Just Paint</h3>
                                             <h1>We Perfect</h1>
                                             <a href="#google-map" class="section-btn btn btn-default btn-blue smoothScroll">Contact Us</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                          
                         <div class="about-info">
                              <h2>
    Welcome to
    <img src="{{ asset('assets/images/v.png') }}"
         class="img-responsive"
         alt="Victoria Elite Painting">
   ictoria Elite
</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>Under the leadership of General Principal Zakir Noori, we are dedicated to delivering premium residential and commercial painting services across Melbourne. Our team of skilled tradespeople combines meticulous attention to detail with top-tier materials to transform your space. Whether it is a modern interior refresh or a complete exterior overhaul, we take pride in ensuring a flawless finish and a seamless experience from start to finish.Ready to transform your Melbourne property? Give us a buzz today or email us at info@victoriaelitepainting.com to chat about your project or organise a free, no-obligation quote!</p>
                                   
                              </div>
                              <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                  <img src="{{ asset('assets/images/salim.jpg') }}"
                                                 class="img-responsive"
                                             alt="Mr. Zakir Noori">
                                     <figcaption>
                                        <h3>Mr. Zakir Noori</h3>
                                        <p>General Principal</p>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>



    


     <!-- NEWS -->
     <section id="news" data-stellar-background-ratio="2.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Our Services</h2>
                         </div>
                    </div>
                    
                    
          
               </div>
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         
                    </div>
                     @foreach($post as $posts)
                   <div class="col-md-4 col-sm-6"> 
    <!-- NEWS THUMB --> 
    <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s"> 
        <a href="{{ url('showcomment', $posts->id) }}"> 
            <img src="{{ asset('images/' . $posts->imagename) }}" class="img-responsive" alt="{{ $posts->title }}"> 
        </a> 
        <div class="news-info"> 
            <h3><a href=" {{ url('showcomment', $posts->id)  }}">{{ $posts->title }}</a></h3> 
            <p>{{ Str::limit($posts->description, 150) }}</p> 
            <a  class="btn btn-info " style="align:center" href="{{ url('showcomment', $posts->id) }}">Explore</a>
            
            <!-- NEW: Like and Comment Actions -->
            <div class="post-actions d-flex justify-content-between align-items-center my-3 border-top pt-2">
                <!-- Like Button Form -->
              <form action="{{ route('posts.like', ['id' => $posts->id]) }}"
      method="POST"
      class="like-form">

    @csrf

    <button type="submit"
            class="btn btn-link btn-sm text-decoration-none p-0 text-danger like-button">

        <i class="bi bi-heart-fill"></i>

        <span class="like-count">
            {{ $posts->likes_count ?? 0 }}
        </span>

        Likes
    </button>
</form>

                <!-- Comment Indicator linking to Detail Page -->
                <a href="{{ url('showcomment', $posts->id) }}" class="btn btn-link btn-sm text-decoration-none p-0 text-secondary">
                    <i class="bi bi-chat-dots-fill"></i> 
                    <span>{{ $posts->comments_count ?? $posts->comments()->count() }} Comments</span>
                </a>
            </div>

            @auth
                @if(auth()->user()->type == 'Admin') 
                    <div class="mt-2 border-top pt-2"> 
                        <a class='btn btn-danger btn-sm bi bi-trash' href="{{ url('deletepost', $posts->id) }}">Delete</a> 
                        <a class='btn btn-info btn-sm bi bi-pencil' href="{{ url('edit', $posts->id) }}">Edit</a> 
                    </div> 
                @endif 
            @endauth 
        </div> 
    </div> 
</div>

                    @endforeach
                    <div class="d-flex justify-content-center mt-4">
                   {{ $post->links('pagination::bootstrap-5') }}
                  </div>
                   

                    

                   

               </div>
          </div>
     </section>


     <!-- MAKE AN APPOINTMENT -->
     <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">
                     

                    <div class="col-md-6 col-sm-6">
                        <img src="{{ asset('assets/images/appointment-image.jpg') }}"
     class="img-responsive"
     alt="Painting appointment">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="{{url('addappointment')}}">
                              @csrf
                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Make an appointment</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   

                                   <div class="col-md-6 col-sm-6">
                                        <label for="date" id="date">Select Date</label>
                                        <input type="date" name="date" id="date" value="" class="form-control">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="select" id="select">Select Department</label>
                                        <select class="form-control" name="select" id="select">
                                             <option>General</option>
                                             <option>Interior Painting</option>
                                             <option>Exterior Painting</option>
                                             <option>Residential Painting</option>
                                             <option>Roof Painting</option>
                                             <option>Commercial Painting</option>
                                             <option>Decorative Finishes</option>
                                        </select>
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="telephone" id="phone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                                        <label for="Message" id="massage">Additional Message</label>
                                        <textarea class="form-control" rows="5" id="massage" name="massage" placeholder="Message"></textarea>
                                        <button type="submit" class="form-control" id="cf-submit" name="submit">Submit Button</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>


     <!-- GOOGLE MAP -->
     <section id="google-map">
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100628.43824430185!2d145.23449007332837!3d-37.98556037883808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad613fe1cf71e9f%3A0x5045675218cdf80!2z2K_Zhtiv2YbZiNmG2q_YjCDZiNuM2qnYqtmI2LHbjNinINmI24zaqdiq2YjYsduM2KcgMzE3NdiMINin2LPYqtix2KfZhNuM2Kc!5e0!3m2!1sfa!2s!4v1786830233346!5m2!1sfa!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
     </section>           

@endsection
     