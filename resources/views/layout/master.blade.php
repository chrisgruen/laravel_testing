<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 5.7. testing</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	
	 <!-- Styles -->
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">

	<!-- JS -->
	<script src="{{ url('/js/app.js') }}"></script>
</head>

    <body>

        @include('layout.partials.header')
    
        @yield('content')
    
        @include('layout.partials.footer')
    
    </body>
</html>
