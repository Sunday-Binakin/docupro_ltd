<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->


        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>



                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Home Page</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.call.experts') }}">Call Our Experts</a></li>
                        <li><a href="{{ route('all.sliders') }}">Slider</a></li>
                        <li><a href="{{ route('all.services') }}">Services</a></li>
                        <li><a href="{{ route('all.why.chose.us') }}">Why Chose Us</a></li>
                        <li><a href="{{ route('all.our.experts') }}">Our Experts</a></li>

                    </ul>
                </li> --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Home</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('slider.index') }}">Slider</a></li>
                        <li><a href="{{ route('why.chose.us.index') }}">Why Chose Us</a></li>

                    </ul>
                </li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="fas fa-info-circle"></i>
        <span>About</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('about.company.index') }}">About Company</a></li>
        <li><a>Team</a></li>
        <li><a>Testimonials</a></li>
        <li><a>Purpose Statement</a></li>
    </ul>
</li>




            </ul>
        </div>
        <!-- Sidebar -->
    </div>

</div>