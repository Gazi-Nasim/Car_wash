<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- /Navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')
        <!-- /Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /Content-wrapper -->

        <!-- Main Footer -->
        @include('layouts.main_footer')
        <!-- /Main Footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /Control-sidebar -->
    </div>
    <!-- /Wrapper -->

    @include('layouts.footer')
</body>

</html>