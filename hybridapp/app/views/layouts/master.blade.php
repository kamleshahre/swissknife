<?php
$version = [
    'foundation' => '5.0.2',
];
?><!doctype html>
<html lang="{{ Config::get('app.locale') }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>{{ HTML::entities('New Media Design & Development III') }} </title>
    {{ HTML::style("//cdnjs.cloudflare.com/ajax/libs/foundation/{$version['foundation']}/css/normalize.min.css") }}
    {{ HTML::style("//cdnjs.cloudflare.com/ajax/libs/foundation/{$version['foundation']}/css/foundation.min.css") }}
</head>
<body>
<nav class="top-bar" data-topbar>
    <ul class="title-area">
        <li class="name">
            <h1><a href="#">SwissKnifeApp</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        @if (Auth::Guest())
        <!-- Right Nav Section -->
        <ul class="right">
            <li>{{ HTML::linkRoute('frontoffice.user.login', 'Login', [], []) }}</li>
        </ul>
        @else
        <!-- Right Nav Section -->
        <ul class="right">
            <li>{{ HTML::linkRoute('frontoffice.user.logout', 'Meld je af', [], []) }}</li>
        </ul>

        <!-- Left Nav Section -->
        <ul class="left">
            <li><a href="#">Users</a></li>
            <li><a href="#">Tickets</a></li>
            <li><a href="#">Stages</a></li>
            <li><a href="#">Photo's</a></li>
            <li><a href="#">Comments</a></li>
        </ul>
        @endif
    </section>
</nav>
@yield('content')
{{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/foundation/{$version['foundation']}/js/vendor/jquery.min.js") }}
{{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/foundation/{$version['foundation']}/js/foundation.min.js") }}
<script>
    $(document).foundation();
</script>
</body>
</html>