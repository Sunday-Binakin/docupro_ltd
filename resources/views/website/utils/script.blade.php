<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


<script src="{{ asset('website/assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/jarallax/jarallax.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/odometer/odometer.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/wnumb/wNumb.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/wow/wow.js') }}"></script>
<script src="{{ asset('website/assets/vendors/isotope/isotope.js') }}"></script>
<script src="{{ asset('website/assets/vendors/countdown/countdown.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/vegas/vegas.min.js') }}"></script>
<script src="{{ asset('website/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('website/assets/vendors/timepicker/timePicker.js') }}"></script>
<script src="{{ asset('website/assets/vendors/circleType/jquery.circleType.js') }}"></script>
<script src="{{ asset('website/assets/vendors/circleType/jquery.lettering.min.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

<script>
    $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
            @elseif (Session::has('info'))
            toastr.info('{{ Session::get('info') }}');
            @elseif (Session::has('warning'))
            toastr.warning('{{ Session::get('warning') }}')
            @endif
            });

</script>

<!-- template js -->
<script src="{{ asset('website/assets/js/insur.js') }}"></script>