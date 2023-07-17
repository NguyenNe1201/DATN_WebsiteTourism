<!DOCTYPE html>
<html lang="en">

<head>
    @include('shared.head')
    {{-- css layout user --}}
    @yield('css-layout-user')
</head>

<body>

    <!-- ======================= Start Navigation ===================== -->
    @include('users.layout_user.navbar_header')
    <!-- ======================= Start Page Title / Start Banner ===================== -->
    @yield('HomePageTitle')
    @yield('PageTitle')
    {{-- ----------------------- Start Main Content ----------------------------------- --}}
    @yield('content')
    <!-- ================= footer start ========================= -->
    <footer class="footer dark-bg">
        @include('users.layout_user.footer')
    </footer>
    <!-- =================  Back to Top ========================= -->
    <a style="border-radius: 6px;" href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
        <i style="font-size: 3.5rem; font-weight: 900;" class="fa fa-angle-double-up"></i>
    </a>
    <!-- =================== START JAVASCRIPT ================== -->
    @include('shared.jquery_public')
    <!-- js all layout user -->
    @yield('js-layout-user')
    <!-- js search tour -->
    <script src="{{ asset('js_home/search_tour.js') }}"></script>
    <!-- js search blog -->
    <script src="{{ asset('js_home/search_blog.js') }}"></script>
    <!-- js favorite tour -->
    <script src="{{ asset('js_home/favorite_tour.js') }}"></script>
    <!-- js favorite blog -->
    <script src="{{ asset('js_home/favortie_blog.js') }}"></script>
     <!-- js favorite guider -->
     <script src="{{ asset('js_home/favorite_guider.js') }}"></script>
    <!-- js guider plan (calendar) -->
    <script src="{{ asset('js_home/guider_plan.js') }}"></script>
    <!-- js home search tour -->
    <script>
        function submitForm() {
            document.getElementById("searchForm").submit();
        }
    </script>
    <!-- =================== END JAVASCRIPT ================== -->
</body>

</html>
