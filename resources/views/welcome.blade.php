@extends ('layout')


@section ('content')
<!-- Masthead -->
<header class="masthead bg-primary text-white text-center">
  <div class="container d-flex align-items-center flex-column">

    <!-- Masthead Avatar Image -->
    <img class="masthead-avatar mb-5" src="img/avatar.png" alt="">

    <div class="md-form form-lg mb-5">
      <form action="{{route('search')}}" method="GET" class="search-form">
        <i class="fa search-icon"></i>
        <input type="text" name="query" id="query" class="form-control form-control-lg search-box" placeholder="Search catalog">
      </form>
    </div>
    <!-- Masthead Heading -->
    <h1 class="masthead-heading text-uppercase mb-0">FSRE Games</h1>

    <!-- Icon Divider -->
    <div class="divider-custom divider-light">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon">
        <i class="fas fa-star"></i>
      </div>
      <div class="divider-custom-line"></div>
    </div>

    <!-- Masthead Subheading -->
    <p class="masthead-subheading font-weight-light mb-0">All games u need at one place.</p>

  </div>
</header>

<!-- Portfolio Section -->
<section class="page-section portfolio text-white" id="portfolio">
  <div class="container">

    <!-- Portfolio Section Heading -->
    <h2 class="page-section-heading text-center text-uppercase text-white mb-0">Categories</h2>

    <!-- Icon Divider -->
    <div class="divider-custom">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon">
        <i class="fas fa-star"></i>
      </div>
      <div class="divider-custom-line"></div>
    </div>

    <!-- Portfolio Grid Items -->
    <div class="row">

      <!-- Categories -->
      @foreach ($categories as $category)   
      <div class="col-md-6 col-lg-4">
        <a href="{{route('categories.show',$category)}}">
        <div class="portfolio-item mx-auto">
          <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
            <div class="portfolio-item-caption-content text-center text-white">
              <p class="page-section-heading text-center  text-white mb-0">{{$category->name}}</p> 
            </div>
          </div>
          <img class="img-fluid" src="{{ asset('img/categories') }}/{{$category->avatar}}" alt="">
        </div>
        </a>
      </div>
      @endforeach
     

    </div>
    <!-- /.row -->

  </div>
</section>

<!-- About Section -->
<section class="page-section bg-primary text-white mb-0" id="about">
  <div class="container">

    <!-- About Section Heading -->
    <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>

    <!-- Icon Divider -->
    <div class="divider-custom divider-light">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon">
        <i class="fas fa-star"></i>
      </div>
      <div class="divider-custom-line"></div>
    </div>

    <!-- About Section Content -->
    <div class="row">
      <div class="col-lg-10 ml-auto masthead-subheading font-weight-light">
        <p class="lead masthead-subheading font-weight-light ">Fsre Games je projekt namijenjen pretrazivanju igara.Na projektu sudjeluju:</p>
        <ul>
          <li>Robert Sliskovic</li>
          <li>Branimir Raguz</li>
          <li>Boze Skoko</li>
        </ul>
      </div>
      
    </div>



  </div>
</section>

<!-- Contact Section -->
<section class="page-section" id="contact">
  <div class="container">

    <!-- Contact Section Heading -->
    <h2 class="page-section-heading text-center text-uppercase text-white mb-0">Contact us</h2>

    <!-- Icon Divider -->
    <div class="divider-custom">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon">
        <i class="fas fa-star"></i>
      </div>
      <div class="divider-custom-line"></div>
    </div>

    <!-- Contact Section Form -->
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
        <form name="sentMessage" id="contactForm" novalidate="novalidate">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Name</label>
              <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Email Address</label>
              <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Phone Number</label>
              <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Message</label>
              <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</section>

<!-- Footer -->
<footer class="footer text-center">
  <div class="container">
    <div class="row">

      <!-- Footer Location -->
      <div class="col-lg-4 mb-5 mb-lg-0">
        <h4 class="text-uppercase mb-4"></h4>
        <p class="lead mb-0">
          <br></p>
      </div>

      <!-- Footer Social Icons -->
      <div class="col-lg-4 mb-5 mb-lg-0">
        <h4 class="text-uppercase mb-4">Github repository</h4>
        <a class="btn btn-outline-light btn-social mx-1" href="https://github.com/robo58/FSRE-RWA-projekt" target="_blank">
          <i class="fab fa-github"></i>
        </a>
      </div>


    </div>
  </div>
</footer>

<!-- Copyright Section -->
<section class="copyright py-4 text-center text-white">
  <div class="container">
    <small>Copyright &copy; FSRE Games</small>
  </div>
</section>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
  <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
    <i class="fa fa-chevron-up"></i>
  </a>
</div>

@endsection
