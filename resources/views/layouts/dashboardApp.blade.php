<!DOCTYPE html>
<html lang="en">
@include('partials.backend.header')
<div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    @include('partials.backend.sidebar')
    <!-- Content Start -->
    <div class="content">
        @include('partials.backend.navbar')
            <body>
            @yield('full-body')
            </body>
        @include('partials.backend.copyRightFooter')
    </div>
    <!-- Content End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
@include('partials.backend.footer')
@include('partials.modal')
</html>

@yield('js-custom')
