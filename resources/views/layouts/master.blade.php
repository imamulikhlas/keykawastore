<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='description' content='Keykawa'>
    <title>
        @yield('title')
    </title>
    @include('layouts.head')
</head>

<body>
    @include('layouts.installapps')
    <div id="app">
        <div class="max-w-[600px] mx-auto bg-slate-50 ">
            @include('layouts.navbar')  
            @yield('content')                    
        </div>
        @yield('script')
    </div>    
    @include('layouts.footer')
</body>

</html>
@if(Route::is('home') )    
@include('layouts.menu')
@endif
