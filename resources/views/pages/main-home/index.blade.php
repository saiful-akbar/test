@extends('layouts.main.index')

@section('title', 'Saiful Akbar')

@section('main.content')
    @parent

    <main id="main">
        {{-- About Section --}}
        <section id="about" class="about">
            @include('pages.main-home.about')
        </section>

        {{-- Skills Section --}}
        <section id="skills" class="skills section-bg">
            @include('pages.main-home.skill')
        </section>

        {{-- Resume Section --}}
        <section id="resume" class="resume">
            @include('pages.main-home.resume')
        </section>

        {{-- Contact Section --}}
        <section id="contact" class="contact section-bg">
            @include('pages.main-home.contact')
        </section>




        {{-- Portfolio Section --}}
        {{-- <section id="portfolio" class="portfolio section-bg">
            <div class="container">

            <div class="section-title">
                <h2>Portfolio</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="{{ asset('assets/main-layouts/img/portfolio/portfolio-1.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-links">
                    <a href="{{ asset('assets/main-layouts/img/portfolio/portfolio-1.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <img src="{{ asset('assets/main-layouts/img/portfolio/portfolio-2.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-links">
                    <a href="{{ asset('assets/main-layouts/img/portfolio/portfolio-2.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="{{ asset('assets/main-layouts/img/portfolio/portfolio-3.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-links">
                    <a href="{{ asset('assets/main-layouts/img/portfolio/portfolio-3.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <img src="{{ asset('assets/main-layouts/img/portfolio/portfolio-4.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-links">
                    <a href="{{ asset('assets/main-layouts/img/portfolio/portfolio-4.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <img src="{{ asset('assets/main-layouts/img/portfolio/portfolio-5.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-links">
                    <a href="{{ asset('assets/main-layouts/img/portfolio/portfolio-5.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="{{ asset('assets/main-layouts/img/portfolio/portfolio-6.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-links">
                    <a href="{{ asset('assets/main-layouts/img/portfolio/portfolio-6.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <img src="{{ asset('assets/main-layouts/img/portfolio/portfolio-7.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-links">
                    <a href="{{ asset('assets/main-layouts/img/portfolio/portfolio-7.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <img src="{{ asset('assets/main-layouts/img/portfolio/portfolio-8.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-links">
                    <a href="{{ asset('assets/main-layouts/img/portfolio/portfolio-8.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <img src="{{ asset('assets/main-layouts/img/portfolio/portfolio-9.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-links">
                    <a href="{{ asset('assets/main-layouts/img/portfolio/portfolio-9.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                </div>

            </div>

            </div>
        </section> --}}
        {{-- </section>End Portfolio Section --}}

        {{-- Services Section --}}
        {{-- <section id="services" class="services">
            <div class="container">

            <div class="section-title">
                <h2>Services</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                <div class="icon"><i class="bi bi-briefcase"></i></div>
                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bi bi-card-checklist"></i></div>
                <h4 class="title"><a href="">Dolor Sitema</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bi bi-bar-chart"></i></div>
                <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="bi bi-binoculars"></i></div>
                <h4 class="title"><a href="">Magni Dolores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
                <h4 class="title"><a href="">Nemo Enim</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
                </div>
            </div>

            </div>
        </section> --}}
        {{-- </section>End Services Section --}}
    </main>
@endsection
