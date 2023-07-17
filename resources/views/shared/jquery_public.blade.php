    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
    <script src="{{ asset('assets/plugins/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/viewportchecker.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/bootsnav.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/jquery.downCount.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/freshslider.1.0.0.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/bootstrap-wysihtml5.js') }}"></script>
    <!-- Dashboard Js -->
    <script src="{{ asset('assets/plugins/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/jquery.easing.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/jQuery.style.switcher.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('template/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    {{-- sweet --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
    {{-- datatable, checkbox --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    {{-- upload img --}}
    <script src="{{ asset('js_adm/uploadimg.js') }}"></script>
    {{-- js login validate  --}}
    <script src="{{ asset('js_adm/login.js') }}"></script>
    {{-- js main home -- Back to top --}}
    <script src="{{ asset('js_home/main.js') }}"></script>
    {{-- add blog / edit blog jquery validate --}}
    <script src="{{ asset('js_adm/blog_jq_validate.js') }}"></script>
    {{-- ckeditor trình soạn thảo  --}}
    <script src="https://cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
    {{-- laravel - filemanager  --}}
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    {{--  --}}
    <script>
        function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }

        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#styleOptions').styleSwitcher();
        });
    </script>
