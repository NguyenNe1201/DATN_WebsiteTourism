<!DOCTYPE html>
<html lang="en">

<head>
    @include('shared.head')
    {{-- chart --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    {{--  --}}
    @yield('css_content_adm')

</head>

<body>

    @include('admin.layout_adm.header')
    <!-- ======================= Start Dashboard ===================== -->
    <section class="dashboard gray-bg padd-0 mrg-top-50">
        <div class="container-fluid">
            <div class="row">
                {{-- right menu --}}
                @include('admin.layout_adm.rightmenu')
                {{-- end right menu --}}
                {{--  --}}
                <div>
                    @yield('content_adm')
                </div>
                {{--  --}}
            </div>
        </div>
    </section>
    <!-- ======================= End Dashboard ===================== -->
    <!-- =================== START JAVASCRIPT ================== -->
    @include('shared.jquery_public')
    {{-- public js section content admin --}}
    @yield('js_content_adm')
    {{-- chart --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    {{--  --}}
    <script src="{{ asset('js_adm/list_cate_blog.js') }}"></script>
    {{--  --}}
    <script src="{{ asset('js_adm/list_cate_tour.js') }}"></script>
    {{--  --}}
    <script src="{{ asset('js_adm/gallery_tour.js') }}"></script>
    <!-- =================== END JAVASCRIPT ================== -->
</body>

</html>
