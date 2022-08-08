<nav class="main-menu clearfix">
    <div class="main-menu__wrapper clearfix">
        <div class="container">
            <div class="main-menu__wrapper-inner clearfix">
                <div class="main-menu__left">
                    <div class="main-menu__logo">
                        <a href=""><img style="height: 60px"
                                src="{{ asset('website/assets/images/resources/logo-1.png') }} " alt=""></a>
                    </div>
                    <div class="main-menu__main-menu-box">
                        <div class="main-menu__main-menu-box-inner">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class="dropdown current megamenu">
                                    <a href="{{ route('home') }}">Home </a>
                                    
                                </li>
                                <li class="dropdown">
                                    <a href="{{ route('about') }}">About Us</a>
                                    <ul>
                                        <li><a href="">Message From Head</a></li>
                                        <li><a href="">Mission</a></li>
                                        <li><a href="">Why Choose Docupro</a></li>
                                        <li><a href="">Careers</a></li>
                                        
                                      
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Service / Solutions</a>
                                    <ul>
                                        <li><a href="insurance-01.html">Insurance 01</a></li>
                                        <li><a href="insurance-02.html">Insurance 02</a></li>
                                        <li><a href="car-insurance.html">Car insurance</a></li>
                                        <li><a href="life-insurance.html">Life insurance</a></li>
                                        <li><a href="home-insurance.html">Home insurance</a>
                                        </li>
                                        <li><a href="health-insurance.html">Health insurance</a></li>
                                        <li><a href="business-insurance.html">Business insurance</a></li>
                                        <li><a href="fire-insurance.html">Fire insurance</a></li>
                                        <li><a href="marriage-insurance.html">Marriage insurance</a></li>
                                        <li><a href="travel-insurance.html">Travel insurance</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="{{ route('media') }}">Media Room</a>
                                    
                                </li>
                                {{-- <li class="dropdown">
                                    <a href="#">News</a>
                                    <ul>
                                        <li><a href="news.html">News</a></li>
                                        <li><a href="news-carousel.html">News Carousel</a></li>
                                        <li><a href="news-sidebar.html">News Sidebar</a></li>
                                        <li><a href="news-details.html">News Details</a></li>
                                    </ul>
                                </li> --}}
                                <li>
                                    <a href="{{ route('contact.us') }}">Contact </a>
                                </li>
                            </ul>
                        </div>
                        <div class="main-menu__main-menu-box-search-get-quote-btn">
                            <div class="main-menu__main-menu-box-search">
                                <a href="#"
                                    class="main-menu__search search-toggler icon-magnifying-glass"></a>
                            </div>
                            <div class="main-menu__main-menu-box-get-quote-btn-box">
                                <a href="contact.html"
                                    class="thm-btn main-menu__main-menu-box-get-quote-btn">Get a Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-menu__right">
                    <div class="main-menu__call">
                        <div class="main-menu__call-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="main-menu__call-content">
                            <a href="tel:9200368090">+92 (003) 68-090</a>
                            <p>Call to Our Experts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>