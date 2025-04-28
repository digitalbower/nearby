<!-- Fonts and icons -->
<script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
<script>
  WebFont.load({
    google: { families: ["Public Sans:300,400,500,600,700"] },
    custom: {
      families: [
        "Font Awesome 5 Solid",
        "Font Awesome 5 Regular",
        "Font Awesome 5 Brands",
        "simple-line-icons",
      ],
      urls: ["{{asset('assets/css/fonts.min.css')}}"],
    },
    active: function () {
      sessionStorage.fonts = true;
    },
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
 <!--   Core JS Files   -->
 <script src="{{asset('assets/js/core/jquery-3.7.1.min.js')}}"></script>
 <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
 <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

 <!-- jQuery Scrollbar -->
 <script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

 <!-- Chart JS -->
 <script src="{{asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

 <!-- jQuery Sparkline -->
 <script src="{{asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

 <!-- Chart Circle -->
 <script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

 <!-- Datatables -->
 <script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

 <!-- Bootstrap Notify -->
 <script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

 <!-- jQuery Vector Maps -->
 <script src="{{asset('assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
 <script src="{{asset('assets/js/plugin/jsvectormap/world.js')}}"></script>

 <!-- Sweet Alert -->
 <script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

 <!-- Kaiadmin JS -->
 <script src="{{asset('assets/js/kaiadmin.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery.validate/jquery.validate.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

<script>
  var csrf_token = "{{ csrf_token() }}";
</script>
@stack('scripts')