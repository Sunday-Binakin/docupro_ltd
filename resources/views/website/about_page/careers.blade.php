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
                <li><a href="">Home</a></li>
                <li><span>/</span></li>
                <li style="Color: #2088cb">Careers</li>
            </ul>
            <h2>Careers</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--News One Start-->
<section class="news-carousel-page">
    <div class="container">
        <div class="row">
            <div class="thm-owl__carousel owl-theme owl-carousel news-carousel carousel-dot-style" data-owl-options='{
                "items": 3,
                "margin": 30,
                "smartSpeed": 700,
                "loop":true,
                "autoplay": 6000,
                "nav":false,
                "dots":true,
                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                "responsive":{
                    "0":{
                        "items":1
                    },
                    "768":{
                        "items":2
                    },
                    "992":{
                        "items": 3
                    }
                }
            }'>
                <div class="item">
                    <!--News One Single Start-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('website/assets/images/blog/news-1-1.jpg')}}" alt="">
                            <div class="news-one__tag">
                                <p><i class="far fa-folder"></i>BUSINESS</p>
                            </div>
                            <div class="news-one__arrow-box">
                                <a href="news-details.html" class="news-one__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022 </a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title"><a href="news-details.html">Which allows you to pay down insurance bills</a></h3>
                            <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            <div class="news-one__read-more">
                                <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                </div>
                <div class="item">
                    <!--News One Single Start-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('website/assets/images/blog/news-1-2.jpg')}}" alt="">
                         <div class="news-one__tag">
                                <p><i class="far fa-folder"></i>BUSINESS</p>
                            </div>
                            <div class="news-one__arrow-box">
                                <a href="news-details.html" class="news-one__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022 </a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title"><a href="news-details.html">Leverage agile frameworks to provide</a></h3>
                            <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            <div class="news-one__read-more">
                                <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                </div>
                <div class="item">
                    <!--News One Single Start-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('website/assets/images/blog/news-1-3.jpg')}}" alt="">
                        <div class="news-one__tag">
                                <p><i class="far fa-folder"></i>BUSINESS</p>
                            </div>
                            <div class="news-one__arrow-box">
                                <a href="news-details.html" class="news-one__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022 </a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title"><a href="news-details.html">Bring to the table win-win survival strategis</a></h3>
                            <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            <div class="news-one__read-more">
                                <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                </div>
                <div class="item">
                    <!--News One Single Start-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('website/assets/images/blog/news-1-1.jpg')}}" alt="">
                       <div class="news-one__tag">
                                <p><i class="far fa-folder"></i>BUSINESS</p>
                            </div>
                            <div class="news-one__arrow-box">
                                <a href="news-details.html" class="news-one__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022 </a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title"><a href="news-details.html">Which allows you to pay down insurance bills</a></h3>
                            <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            <div class="news-one__read-more">
                                <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                </div>
                <div class="item">
                    <!--News One Single Start-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('website/assets/images/blog/news-1-2.jpg')}}" alt="">
                        <div class="news-one__tag">
                                <p><i class="far fa-folder"></i>BUSINESS</p>
                            </div>
                            <div class="news-one__arrow-box">
                                <a href="news-details.html" class="news-one__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022 </a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title"><a href="news-details.html">Leverage agile frameworks to provide</a></h3>
                            <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            <div class="news-one__read-more">
                                <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                </div>
                <div class="item">
                    <!--News One Single Start-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('website/assets/images/blog/news-1-3.jpg')}}" alt="">
                       <div class="news-one__tag">
                                <p><i class="far fa-folder"></i>BUSINESS</p>
                            </div>
                            <div class="news-one__arrow-box">
                                <a href="news-details.html" class="news-one__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022 </a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title"><a href="news-details.html">Bring to the table win-win survival strategis</a></h3>
                            <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            <div class="news-one__read-more">
                                <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                </div>
                <div class="item">
                    <!--News One Single Start-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('website/assets/images/blog/news-1-1.jpg')}}" alt="">
                          <div class="news-one__tag">
                                <p><i class="far fa-folder"></i>BUSINESS</p>
                            </div>
                            <div class="news-one__arrow-box">
                                <a href="news-details.html" class="news-one__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022 </a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title"><a href="news-details.html">Which allows you to pay down insurance bills</a></h3>
                            <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            <div class="news-one__read-more">
                                <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                </div>
                <div class="item">
                    <!--News One Single Start-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('website/assets/images/blog/news-1-2.jpg')}}" alt="">
                         <div class="news-one__tag">
                                <p><i class="far fa-folder"></i>BUSINESS</p>
                            </div>
                            <div class="news-one__arrow-box">
                                <a href="news-details.html" class="news-one__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022 </a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title"><a href="news-details.html">Leverage agile frameworks to provide</a></h3>
                            <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            <div class="news-one__read-more">
                                <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                </div>
                <div class="item">
                    <!--News One Single Start-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('website/assets/images/blog/news-1-3.jpg')}}" alt="">
                           <div class="news-one__tag">
                                <p><i class="far fa-folder"></i>BUSINESS</p>
                            </div>
                            <div class="news-one__arrow-box">
                                <a href="news-details.html" class="news-one__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-calendar"></i> 15 March, 2022 </a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 02 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title"><a href="news-details.html">Bring to the table win-win survival strategis</a></h3>
                            <p class="news-one__text">Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            <div class="news-one__read-more">
                                <a href="news-details.html">Read More <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--News One End-->


@endsection