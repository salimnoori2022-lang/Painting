<!DOCTYPE html>
<html lang="en">
<head>

     <title>Victoria Elite Painting</title>
<!--





-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Bootstrap Icons CDN -->
  
     

   
 <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

      <!--MAIN CSS -->
         
    
<link rel="stylesheet" href="{{asset('assets/css/tooplate-style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/navbar.css')}}">
     
 <style>
    

   




          </style>

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- HEADER -->
     <header class="site-top-bar">
       <div class="container">
          <div class="row">
            <!-- Left Side Welcome Column -->
              <div class="col-md-5 col-sm-6">
                <p style="margin: 0;">Welcome to a Professional Home Painting</p>
              </div>

            <!-- Right Side Contact & Auth Column -->
            <div class="col-md-7 col-sm-6 text-align-right">
                <span class="phone-icon"><i class="fa fa-phone"></i> 774-924-0405</span>
                <span class="date-icon"><i class="bi bi-person-fill"></i> 6:00 AM - 10:00 PM (Mon-Fri)</span>
                <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="mailto:info@victoriaelitepainting.com">info@victoriaelitepainting.com</a></span>
                
                
            </div>
        </div>
    </div>
</header>


     <!-- MENU -->
  <section class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- LOGO TEXT HERE -->
            <div class="brand">
                <svg class="logo-h" viewBox="0 0 64 64" aria-label="Victoria Elite Painting logo" role="img">
                    <path d="M7 30 32 9l25 21v25H39V39H25v16H7Z" fill="#b88316"/>
                    <path d="M45 42c0-8 7-13 7-20 0 7 7 12 7 20a7 7 0 0 1-14 0Z" fill="#e7bd57"/>
                    <path d="M12 55h42" stroke="#101010" stroke-width="3" stroke-linecap="round"/>
                </svg>
                
                <div class="brand-text-wrapper">
                    <span class="brand-title">Victoria <span class="blue-text">Elite Painting</span></span>
                    <span class="p1">Quality in every brushstroke</span>
                </div>
            </div>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#top" class="smoothScroll nav-item-link">Home</a></li>
                <li><a href="#about" class="smoothScroll nav-item-link">About Us</a></li>
                <li><a href="#news" class="smoothScroll nav-item-link">Our Services</a></li>
                <li><a href="#google-map" class="smoothScroll nav-item-link">Contact</a></li>
                 
                @if (Route::has('login'))
                    @auth
                        @if(auth()->user()->type == 'Admin' || auth()->user()->id == 1)
                            <li><a href="{{ url('/show') }}" class="smoothScroll nav-item-link">Admin</a></li>
                        @endif
                        <li><a href="{{ url('/profile') }}" class="smoothScroll nav-item-link">Profile</a></li>
                        <li>
                            <a href="{{ route('logout') }}" class="smoothScroll nav-item-link logout-trigger" 
                               onclick="event.preventDefault(); document.getElementById('navbar-logout-form').submit();">
                               <i class="bi bi-box-arrow-right" style="margin-right: 4px;"></i>Log Out
                            </a>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="smoothScroll nav-item-link">Log in</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="smoothScroll nav-item-link">Register</a></li>
                        @endif
                    @endauth
                @endif
              
                <li class="appointment-btn"><a href="#appointment" class="appointment-link">Make an appointment</a></li>
            </ul>
        </div>

    </div>
</section>

@auth
    <form id="navbar-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endauth



     @yield('content')
     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                              <p>Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu elit consequat ultricies.</p>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> 774-924-0405</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">info@victoriaelitepainting.com</a></p>
                              </div>
                         </div>
                    </div>

                  

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                   <p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
                                   <p>Saturday <span>09:00 AM - 08:00 PM</span></p>
                                   <p>Sunday <span>Closed</span></p>
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="https://www.facebook.com/share/1EZc5ss6eC/?mibextid=wwXIfr" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="https://www.instagram.com/salimnoori81?igsi=MTk1a21zeXU3aGZuag%3D%3D&utm_source=qr" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2018 Your Company 
                                   
                                   | Design: <a rel="nofollow" href="https://www.facebook.com/tooplate" target="_parent">Tooplate</a></p>
                              </div>
                         </div>
                        
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/smoothscroll.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>


<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.like-form').forEach(function (form) {
    form.addEventListener('submit', function (event) {
      event.preventDefault();

      const button = form.querySelector('.like-button');
      const count = form.querySelector('.like-count');
      const token = form.querySelector('input[name="_token"]').value;

      button.disabled = true;

      fetch(form.action, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': token,
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
        .then(async response => {
          const data = await response.json();

          if (!response.ok && response.status !== 409) {
            throw new Error(data.message || 'Like request failed');
          }

          return data;
        })
        .then(data => {
          count.textContent = data.likes_count;

          if (data.liked) {
            button.innerHTML = `
                        <i class="bi bi-heart-fill"></i>
                        <span class="like-count">${data.likes_count}</span>
                        Likes
                    `;
          }

          // A 409 means a normal user already liked this post.
          if (data.message) {
            alert(data.message);
          }
        })
        .catch(error => {
          console.error(error);
          alert(error.message);
        })
        .finally(() => {
          button.disabled = false;
        });
    });
  });
});
</script>
      


</body>
</html>