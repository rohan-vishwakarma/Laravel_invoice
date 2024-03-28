<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="420">
    <title>@yield('title')</title>
    @include('Layouts/bootstrap')
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
</head>
<body style="background: white"> 

    @include('Layouts.navbar')

    <div >
        @yield('content')
    </div> 
    
    <div class="footer">
        @yield('footer')
    </div>


    @include('Layouts/javascript')


    

</body>


</html>