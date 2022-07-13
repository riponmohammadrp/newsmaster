<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>NewsMaster</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		@include('layouts.common.css')
   </head>
   <body>
        @include('layouts.common.header')
        <main>
            @yield('content')
        </main>
        @include('layouts.common.footer')
        @include('layouts.common.js')
    </body>
</html>