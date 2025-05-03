@include('partials.header')
@include('partials.sidebar')
<!-- Main content -->
<section class="content" style="padding-top: 5%;">
    <div class="container-fluid">
@include('partials.message')

@yield('content')
@include('partials.footer')
