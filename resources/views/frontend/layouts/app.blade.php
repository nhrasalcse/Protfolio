@include('frontend.includes.header')
@include('frontend.includes.headermenu')
<div class="wrapper">

    {{--<div class="wrapper">--}}
    {{--this is for mobile view if problem then show uncomment--}}

    @yield('content')

</div>

@include('frontend.includes.footer')
