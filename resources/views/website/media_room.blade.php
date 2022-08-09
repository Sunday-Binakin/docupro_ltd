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
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>Media Room</li>
            </ul>
            <h2>Media Room</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Media Room Start-->
<section class="news-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="news-sideabr__left">
                    <div class="news-sideabr__content">
                        <!--Blog Sidebar Single-->
                        <div class="news-sideabr__single">
                            <div class="news-sideabr__img">
                                <img src="{{ asset('website/assets/images/blog/news-sideabr-img-1.jpg') }}" alt="">
                            </div>
                            <div class="news-sideabr__content-box">
                                <ul class="list-unstyled news-sideabr__meta">
                                    <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022
                                        </a>
                                    </li>
                                    <li><a href="news-details.html"><i class="far fa-comments"></i> 02
                                            Comments</a>
                                    </li>
                                </ul>
                                <h3 class="news-sideabr__title">
                                    <a href="news-details.html">Which allows you to pay down insurance bills</a>
                                </h3>
                                <p class="news-sideabr__text">There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum.</p>
                                <div class="news-sideabr__bottom-btn-box">
                                    <a href="news-details.html" class="news-sideabr__btn thm-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!--Blog Sidebar Single-->
                        <div class="news-sideabr__single">
                            <div class="news-sideabr__img">
                                <img src="{{ asset('website/assets/images/blog/news-sideabr-img-2.jpg') }}" alt="">
                                <div class="news-sideabr__video-link">
                                    <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                        <div class="news-sideabr__video-icon">
                                            <span class="fa fa-play"></span>
                                            <i class="ripple"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="news-sideabr__content-box">
                                <ul class="list-unstyled news-sideabr__meta">
                                    <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022
                                        </a>
                                    </li>
                                    <li><a href="news-details.html"><i class="far fa-comments"></i> 02
                                            Comments</a>
                                    </li>
                                </ul>
                                <h3 class="news-sideabr__title">
                                    <a href="news-details.html">Bring to the table win-win survival strategis</a>
                                </h3>
                                <p class="news-sideabr__text">There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum.</p>
                                <div class="news-sideabr__bottom-btn-box">
                                    <a href="news-details.html" class="news-sideabr__btn thm-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!--Blog Sidebar Single-->
                        <div class="news-sideabr__single">
                            <div class="news-sideabr__img">
                                <img src="{{ asset('website/assets/images/blog/news-sideabr-img-3.jpg') }}" alt="">
                            </div>
                            <div class="news-sideabr__content-box">
                                <ul class="list-unstyled news-sideabr__meta">
                                    <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022
                                        </a>
                                    </li>
                                    <li><a href="news-details.html"><i class="far fa-comments"></i> 02
                                            Comments</a>
                                    </li>
                                </ul>
                                <h3 class="news-sideabr__title">
                                    <a href="news-details.html">There are many variations of passages of Lorem</a>
                                </h3>
                                <p class="news-sideabr__text">There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum.</p>
                                <div class="news-sideabr__bottom-btn-box">
                                    <a href="news-details.html" class="news-sideabr__btn thm-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-sideabr__bottom-box">
                        <div class="news-sideabr__bottom-box-icon">
                            <img src="{{ asset('website/assets/images/icon/news-sideabr-bottom-box-icon.png') }}" alt="">
                        </div>
                        <p class="news-sideabr__bottom-box-text">There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    </div>
                    <div class="news-sideabr__delivering-services">
                        <div class="news-sideabr__delivering-services-icon">
                            <a href="news-details.html"><img src="{{ asset('website/assets/images/icon/news-sideabr__delivering-services-icon.png') }}" alt=""></a>
                        </div>
                        <h3 class="news-sideabr__delivering-services-title"><a href="news-details.html">We’re providing the best insurance services</a></h3>
                    </div>
                    <div class="news-sideabr__load-more">
                        <a href="contact.html" class="thm-btn news-sideabr__load-more-btn">Load More Posts</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search">
                        <form action="#" class="sidebar__search-form">
                            <input type="search" placeholder="Search here">
                            <button type="submit"><i class="icon-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Latest Posts</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="{{ asset('website/assets/images/blog/lp-1-1.jpg')}}" alt="">
                             </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i> by Admin</span>
                                        <a href="news-details.html">Get tips to get quick
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
                                        <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i> by Admin</span>
                                        <a href="news-details.html">Promoting the Rights of Children</a>
                                    </h3>
                                </div>
                            </li>
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="{{ asset('website/assets/images/blog/lp-1-3.jpg')}}" alt="">
                                </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i> by Admin</span>
                                        <a href="news-details.html">Bring to the table win-win survival</a>
                                    </h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar__single sidebar__category">
                        <h3 class="sidebar__title">Categories</h3>
                        <ul class="sidebar__category-list list-unstyled">
                            <li><a href="news-details.html">Life Insurance <span class="fas fa-angle-double-right"></span></a></li>
                            <li class="active"><a href="news-details.html">Health <span class="fas fa-angle-double-right"></span></a></li>
                            <li><a href="news-details.html">Policies <span class="fas fa-angle-double-right"></span></a>
                            </li>
                            <li><a href="news-details.html">Payments <span class="fas fa-angle-double-right"></span></a></li>
                            <li><a href="news-details.html">Home Insurance <span class="fas fa-angle-double-right"></span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar__single sidebar__tags">
                        <h3 class="sidebar__title">Tags</h3>
                        <div class="sidebar__tags-list">
                            <a href="#">Insurance</a>
                            <a href="#">Policies</a>
                            <a href="#">Financial</a>
                            <a href="#">Health Insurance</a>
                            <a href="#">Money</a>
                        </div>
                    </div>
                    <div class="sidebar__single sidebar__comments">
                        <h3 class="sidebar__title">Comments</h3>
                        <ul class="sidebar__comments-list list-unstyled">
                            <li>
                                <div class="sidebar__comments-icon">
                                    <i class="fas fa-comment"></i>
                                </div>
                                <div class="sidebar__comments-text-box">
                                    <p>A Wordpress Commenter <br> on Launch New Mobile App</p>
                                </div>
                            </li>
                            <li>
                                <div class="sidebar__comments-icon">
                                    <i class="fas fa-comment"></i>
                                </div>
                                <div class="sidebar__comments-text-box">
                                    <p><span>John Doe</span> on Template:</p>
                                    <h5>Comments</h5>
                                </div>
                            </li>
                            <li>
                                <div class="sidebar__comments-icon">
                                    <i class="fas fa-comment"></i>
                                </div>
                                <div class="sidebar__comments-text-box">
                                    <p>A Wordpress Commenter <br> on Launch New Mobile App</p>
                                </div>
                            </li>
                            <li>
                                <div class="sidebar__comments-icon">
                                    <i class="fas fa-comment"></i>
                                </div>
                                <div class="sidebar__comments-text-box">
                                    <p> <span>John Doe</span> on Template:</p>
                                    <h5>Comments</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Media Room End-->
@endsection