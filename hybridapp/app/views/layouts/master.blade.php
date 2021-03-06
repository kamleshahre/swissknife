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
    {{ HTML::style("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css") }}
    {{ HTML::style("./_js/datepicker/jquery.simple-dtpicker.css") }}
    {{ HTML::style("./_styles/main.css") }}
    {{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/foundation/{$version['foundation']}/js/vendor/jquery.min.js") }}
</head>
<body>
<nav class="top-bar" data-topbar>
    <ul class="title-area">
        <li class="name">
            <h1>{{ HTML::linkRoute('backoffice.index', 'SwissKnifeApp', [], []) }}</h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        @if (Auth::Guest())
        <!-- Right Nav Section -->
        <ul class="right">
            <li>{{ HTML::linkRoute('backoffice.user.login', 'Login', [], []) }}</li>
        </ul>
        @else
        <!-- Right Nav Section -->
        <ul class="right">
            <li>{{ HTML::linkRoute('backoffice.user.logout', 'Meld je af', [], []) }}</li>
        </ul>

        <!-- Left Nav Section -->
        <ul class="left">
            <li>{{ HTML::linkRoute('backoffice.user.index', 'Users', [], []) }}</li>
            <li>{{ HTML::linkRoute('backoffice.ticket.index', 'Tickets', [], []) }}</li>
            <li>{{ HTML::linkRoute('backoffice.stage.index', 'Stages', [], []) }}</li>
            <li>{{ HTML::linkRoute('backoffice.artist.index', 'Artists', [], []) }}</li>
            <li>{{ HTML::linkRoute('backoffice.photo.index', 'Photos', [], []) }}</li>
            <li>{{ HTML::linkRoute('backoffice.comment.index', 'Comments', [], []) }}</li>
        </ul>
        @endif
    </section>
</nav>
@yield('content')
{{ HTML::script("//cdnjs.cloudflare.com/ajax/libs/foundation/{$version['foundation']}/js/foundation.min.js") }}
<script>
    $(document).foundation();
</script>
</body>
</html>
