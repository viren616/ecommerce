@extends('Front.layout')

<style>
    .show {
        color: white;
        background-image: url('{{ asset('storages/media/profile_pic') . '/' . $home[0]->image }}');
        border-radius: 106%;
        position: absolute;
        background-position: 50% 23%;
        background-size: cover;
        left: 15px;
        width: 60px;
        height: 58px;
    }



    @media all and (max-width: 768px) {
        .show {
            color: white;
            background-image: url('{{ asset('storages/media/profile_pic') . '/' . $home[0]->image }}');
            border-radius: 106%;
            position: absolute;
            background-position: 50% 23%;
            background-size: cover;
            left: 15px;
            top: 10px;
            width: 46px;
            height: 44px;
        }

        .hide1 {
            display: none;
        }
    }

    @import url('https://fonts.googleapis.com/css?family=Montserrat');
 
 
    .anima1 {
	background-image: url(https://media.giphy.com/media/gw3MROIiJp44tg0E/giphy.gif);
	/* background-size: cover; */
	color: transparent;
	-moz-background-clip: text;
	-webkit-background-clip: text;
	text-transform: uppercase;
	 
}
.anima {
	background-image: url(https://media.giphy.com/media/26BROrSHlmyzzHf3i/giphy.gif);
	/* background-size: cover; */
	color: transparent;
	-moz-background-clip: text;
	-webkit-background-clip: text;
	text-transform: uppercase;
	 
}
/* styling my button */

.white-mode {
	text-decoration: none;
	padding: 7px 10px;
	background-color: #122;
	border-radius: 3px;
	color: #FFF;
	transition: .35s ease-in-out;
	position: absolute;
	left: 15px;
	bottom: 15px;
	font-family: "Montserrat";
}

.white-mode:hover {
	background-color: #FFF;
	color: #122;
}

 
</style>
@section('container')
    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container">
            <div id="icondiv" class="hide">
            </div>
            
            <h1 id="headerdiv"><a href="{{ route('front.home') }}" class="text">Hello i'm <span class="anima">
                        {{ $home[0]->name }}</span></a></h1>
            {{-- <a href="index.html" class="mr-auto"><img src="{{ asset('front_assets/img/logo.png') }}" alt="" class="img-fluid"></a> --}}

            <h2>{{ $home[0]->description }} </h2>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link active " href="#header">Home</a></li>
                    <li><a class="nav-link " href="#about">About</a></li>
                    <li><a class="nav-link" href="#resume">Resume</a></li>
                    <li><a class="nav-link" href="#services">Services</a></li>
                    <li><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle">
                
                </i>
            </nav><!-- .navbar -->

            <div class="social-links  ">
                @foreach ($home as $item)
                    <a href="{{ $item->icon_link}}" target="_blank" class="{{ $item->icon_name }}  "><i class="bi bi-{{ $item->icon_name }} anima1"></i></a>
                @endforeach

            </div>

        </div>
    </header><!-- End Header -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <!-- ======= About Me ======= -->
        <div class="about-me container">

            <div class="section-title">
                <h2>About</h2>
                <p >Learn more about me</p>
            </div>

            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <img src="assets/img/me.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content " data-aos="fade-left">
                    <h3 >{{ $about[0]->field_name }}</h3>
                    <p class="fst-italic ">

                        {!! $about[0]->short_desc !!}
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong>
                                    <span>{{ date('d M Y', strtotime($about[0]->birthday)) }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                    <span> <a target="_blank"
                                            href="https://{{ $about[0]->website }}">{{ $about[0]->website }}</a></span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+91
                                        {{ $about[0]->phone }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ $about[0]->city }}</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong>
                                    <span>{{ $about[0]->age }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong>
                                    <span>{{ $about[0]->degree }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>PhEmailone:</strong>
                                    <span>{{ $about[0]->email }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                    <span>{{ $about[0]->freelance }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {!! $about[0]->description !!}
                </div>
            </div>

        </div><!-- End About Me -->

        <!-- ======= Counts ======= -->
        <div class="counts container">

            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $about[0]->happy_client }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Happy Clients</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="bi bi-journal-richtext"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $about[0]->projects }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Projects</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-headset"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $about[0]->support }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-award"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $about[0]->awards }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Awards</p>
                    </div>
                </div>
            </div>
        </div><!-- End Counts -->

        <!-- ======= Skills  ======= -->
        <div class="skills container">

            <div class="section-title">
                <h2>Skills</h2>
            </div>

            <div class="row skills-content">
                @foreach ($skill as $item)
                    <div class="col-lg-6">
                        <div class="progress">
                            <span class="skill">{{ $item->skill }} <i class="val">100%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $item->percent }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- End Skills -->

        <!-- ======= Interests ======= -->
        <div class="interests container">

            <div class="section-title">
                <h2>Interests</h2>
            </div>
            <div class="row">
                @php
                    $counter = 1;
                    $space = '';
                @endphp
                @foreach ($interest as $item)

                    <div class="col-lg-3 col-md-4 my-1 {{ $space }}">
                        <div class="icon-box">
                            <i class="{{ $counter++ }} bi bi-alarm" id="icon_color"></i>
                            <h3>{{ $item->interest }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- End Interests -->

        <!-- ======= Testimonials ======= -->
        <div class="testimonials container">

            <div class="section-title">
                <h2>Testimonials</h2>
            </div>

            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('front_assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                legam anim culpa.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('front_assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam
                                duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('front_assets/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat
                                minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore
                                labore illum veniam.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('front_assets/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                culpa fore nisi cillum quid.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('front_assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="owl-carousel testimonials-carousel">

            </div>

        </div><!-- End Testimonials  -->

    </section><!-- End About Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
        <div class="container">

            <div class="section-title">
                <h2>Resume</h2>
                <p>Check My Resume</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <h3 class="resume-title">Sumary</h3>
                    <div class="resume-item pb-0">
                        <h4>{{ $home[0]->name }} </h4>
                        <p><em>{!! $resume[0]->summary_desc !!}</em></p>
                        <p>
                        <ul>
                            <li>{{ $resume[0]->current_address }} , {{ $resume[0]->current_city }},
                                {{ $resume[0]->current_state }}</li>
                            <li>+91 {{ $about[0]->phone }} </li>
                            <li>{{ $about[0]->email }} </li>
                        </ul>

                        </p>
                    </div>

                    <h3 class="resume-title">Education</h3>
                    @foreach ($education as $item)
                        <div class="resume-item">
                            <h4>{{ $item->course_name }}</h4>
                            @php
                                $date_from = date('Y', strtotime($item->college_from));
                                $date_to = date('Y', strtotime($item->college_to));
                            @endphp
                            <h5>{{ $date_from }} - {{ $date_to }}</h5>
                            <p><em>{{ $item->college_name }}, {{ $item->college_city }},
                                    {{ $item->college_state }}</em></p>
                            {!! $item->description !!}
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-6">
                    <h3 class="resume-title">Professional Experience</h3>
                    @foreach ($experience as $item)

                        <div class="resume-item">
                            <h4>{{ $item->field_name }}</h4>
                            @php
                                $experience_from = date('Y', strtotime($item->experience_from));
                                $experience_to = date('Y', strtotime($item->experience_to));
                            @endphp
                            <h5>{{ $experience_from }} - {{ $experience_to }}</h5>
                            <p><em>{{ $item->company_name }}, {{ $item->company_city }},
                                    {{ $item->company_state }}</em></p>
                            <p>
                                {!! $item->role_description !!}
                            </p>
                        </div>
                    @endforeach
                    <h3 class="resume-title">Projects </h3>
                    @foreach ($project as $item)

                        <div class="resume-item">
                            <h4>{{ $item->project_name }}</h4>
                            @php
                                $project_from = date('Y', strtotime($item->project_from));
                                $project_to = date('Y', strtotime($item->project_to));
                            @endphp
                            <h5>{{ $project_from }} - {{ $project_to }}</h5>
                            <p><em>{{ $item->client_name }}, {{ $item->city }},
                                    {{ $item->state }}</em></p>
                            <p>
                                {!! $item->description !!}
                            </p>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="col-lg-6 offset-md-6 "  >
                
                </div> --}}
               
            </div>

        </div>
    </section><!-- End Resume Section -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Services</h2>
                <p>My Services</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a href="">Lorem Ipsum</a></h4>
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="">Sed ut perspiciatis</a></h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4><a href="">Magni Dolores</a></h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4><a href="">Nemo Enim</a></h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-slideshow"></i></div>
                        <h4><a href="">Dele cardo</a></h4>
                        <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-arch"></i></div>
                        <h4><a href="">Divera don</a></h4>
                        <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->
    <!--======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-title">
                <h2>Portfolio</h2>
                <p>My Works</p>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Web Template</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                @if (isset($app[0]))
                    @foreach ($app as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('images/project_images/' . $item->image) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $item->project_name }}</h4>
                                    <p>App</p>
                                    <div class="portfolio-links">
                                        <a href="{{ asset('images/project_images/' . $item->image) }}"
                                            data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i
                                                class="bx bx-plus"></i></a>
                                        <a href="{{ route('front.portfolio_details', ['id' => $item->project_id]) }}"
                                            data-gallery="portfolioDetailsGallery" data-glightbox="type: external"
                                            class="portfolio-details-lightbox" title="Portfolio Details"><i
                                                class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if (isset($web_Template[0]))
                    @foreach ($web_Template as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('images/project_images/' . $item->image) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $item->project_name }}</h4>
                                    <p>Web Template</p>
                                    <div class="portfolio-links">
                                        <a href="{{ asset('images/project_images/' . $item->image) }}"
                                            data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i
                                                class="bx bx-plus"></i></a>
                                        <a href="{{ route('front.portfolio_details', ['id' => $item->project_id]) }}"
                                            data-gallery="portfolioDetailsGallery" data-glightbox="type: external"
                                            class="portfolio-details-lightbox" title="Portfolio Details"><i
                                                class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if (isset($Website[0]))
                    @foreach ($Website as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('images/project_images/' . $item->image) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $item->project_name }}</h4>
                                    <p>Website</p>
                                    <div class="portfolio-links">
                                        <a href="{{ asset('images/project_images/' . $item->image) }}"
                                            data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i
                                                class="bx bx-plus"></i></a>
                                        <a href="{{ route('front.portfolio_details', ['id' => $item->project_id]) }}"
                                            data-gallery="portfolioDetailsGallery" data-glightbox="type: external"
                                            class="portfolio-details-lightbox" title="Portfolio Details"><i
                                                class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Me</p>
            </div>

            <div class="row mt-2">

                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-map"></i>
                        <h3>My Address</h3>
                        {{-- <p>A108 Adam Street, New York, NY 535022</p> --}}
                        <p>{{ $resume[0]->current_address }},{{ $resume[0]->current_city }} ,
                            {{ $resume[0]->current_state }} </p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-share-alt"></i>
                        <h3>Social Profiles</h3>
                        <div class="social-links">
                            @foreach ($home as $item)
                                <a href="#" class="{{ $item->icon_name }}"><i
                                        class="bi bi-{{ $item->icon_name }}"></i></a>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-4 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-envelope"></i>
                        <h3>Email Me</h3>
                        <p>{{ $about[0]->email }}</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-phone-call"></i>
                        <h3>Call Me</h3>
                        <p>+91 {{ $about[0]->phone }}</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.manage_contact') }}" method="post" role="form" class="php-email-form mt-4">
                <div class="row">
                    @csrf
                    <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control " name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
        </div>
    </section><!-- End Contact Section -->

    <script>
        const random_hex_color_code = () => {
            let n = (Math.random() * 0xfffff * 1000000).toString(16);
            return '#' + n.slice(0, 6);
        };

        function colorss() {
            alert("G");
            //  $("#icon_color").css('color',random_hex_color_code());
        }
    </script>
@endsection
