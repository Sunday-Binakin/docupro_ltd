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

<script type="text/javascript">
    $(document).ready(function(e){
    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        // reader.readAsDataURl(e.target.files['0']);
        reader.readAsDataURL(this.files[0]);
    });


});
</script>
 <!-- Required datatable js -->
 <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

 <!-- Datatable init js -->
 <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

 <!-- Sweet Alerts js -->
 <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

 <!-- Sweet alert init js-->
 <script src="{{ asset('backend/assets/js/pages/sweet-alerts.init.js') }}"></script>

<!-- template js -->
<script src="{{ asset('website/assets/js/insur.js') }}"></script>