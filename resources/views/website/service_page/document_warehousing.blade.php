@extends('website.master')
@section('page-content')
<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{ asset('website/assets/images/backgrounds/page-header-bg.jpg') }})">
    </div>
    <div class="page-header-shape-1"><img src="{{ asset('website/assets/images/shapes/page-header-shape-1.png') }}" alt=""></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span>/</span></li>
                <li>Document Warehousing & Archival Solutions</li>
            </ul>
            <h2>Document Warehousing & Archival Solutions</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--News Details Start-->
<section class="news-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="news-details__left">
                    <div class="news-details__img">
                        <img src="{{  asset('website/assets/images/blog/news-details-img-1.jpg') }}" alt="">
                    </div>
                    <div class="news-details__content">
                        {{-- <ul class="list-unstyled news-details__meta">
                            <li><a href=""><i class="far fa-calendar"></i> 15 March, 2022 </a>
                            </li>
                            <li><a href=""><i class="far fa-comments"></i> 02 Comments</a>
                            </li>
                        {{-- </ul> --}}
                        {{-- <ul class="list-unstyled news-details__meta"> 
                            <li><a href=""><i class="far fa-calendar"></i> 15 March, 2022 </a>
                            </li>
                            <li><a href=""><i class="far fa-comments"></i> 02 Comments</a>
                            </li>
                        </ul> --}}
                        <h3 class="news-details__title">Which allows you to pay down insurance bills</h3>
                        <p class="news-details__text-1">There are many variations of passages of Lorem Ipsum available,
                            but majority have suffered alteration in some form, by injected humour, or randomised words
                            which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum.
                            Suspendisse ultricies vestibulum vehicula. Proin laoreet porttitor lacus. Duis auctor vel ex
                            eu elementum. Fusce eu volutpat felis. Proin sed eros tincidunt, sagittis sapien eu, porta
                            diam. Aenean finibus scelerisque nulla non facilisis. Fusce vel orci sed quam gravida
                            condimentum. Aliquam condimentum, massa vel mollis volutpat, erat sem pharetra quam, ac
                            mattis arcu elit non massa. Nam mollis nunc velit, vel varius arcu fringilla tristique. Cras
                            elit nunc, sagittis eu bibendum eu, ultrices placerat sem. Praesent vitae metus dolor. Nulla
                            a erat et orci mattis auctor.</p>
                        <p class="news-details__text-2">Mauris non dignissim purus, ac commodo diam. Donec sit amet
                            lacinia nulla. Aliquam quis purus in justo pulvinar tempor. Aliquam tellus nulla,
                            sollicitudin at euismod nec, feugiat at nisi. Quisque vitae odio nec lacus interdum tempus.
                            Phasellus a rhoncus erat. Vivamus vel eros vitae est aliquet pellentesque vitae et nunc. Sed
                            vitae leo vitae nisl pellentesque semper.</p>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    {{-- <div class="sidebar__single sidebar__search">
                        <form action="#" class="sidebar__search-form">
                            <input type="search" placeholder="Search here">
                            <button type="submit"><i class="icon-magnifying-glass"></i></button>
                        </form>
                    </div> --}}
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Solutions</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="{{ asset('website/assets/images/blog/lp-1-1.jpg')}}" alt="">
                        </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i> by
                                            Admin</span>
                                        <a href="">Get tips to get quick
                                            life insurance</a>
                                    </h3>
                                </div>
                            </li>
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="{{ asset('website/assets/images/blog/lp-1-2.jpg')}}" alt="">
                          </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i> by
                                            Admin</span>
                                        <a href="">Promoting the Rights of Children</a>
                                    </h3>
                                </div>
                            </li>
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="{{ asset('website/assets/images/blog/lp-1-3.jpg')}}" alt="">
                         </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i> by
                                            Admin</span>
                                        <a href="">Bring to the table win-win survival</a>
                                    </h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</section>
<!--News Details End-->
@endsection