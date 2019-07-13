@include('backend.includes.header')
<div class="wrapper">

@include('backend.includes.topheade')

@include('backend.includes.sidbar')

{{--<div class="wrapper">--}}
{{--this is for mobile view if problem then show uncomment--}}

@yield('content')

</div>

@include('backend.includes.footer')
