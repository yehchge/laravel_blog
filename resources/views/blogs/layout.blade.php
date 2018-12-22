<!doctype html>
<html>
<head>
    <title><?=(isset($this->title)) ? $this->title : 'MVC2'; ?></title>
    <link rel="stylesheet" href="{{ asset('css/default.css') }}" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/default.js') }}"></script>

    @if (isset($this->js))
        foreach ($this->js as $js) {
            echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
        }
    @endif
</head>
<body>

<div id="header">

    @if (session()->get('loggedIn') == false)
        <a href="{{ route('blogs.index') }}">Index</a>
        <a href="{{ route('blogs.help') }}">Help</a>
    @endif
    @if (session()->get('loggedIn') == true)
        <a href="{{ route('blogs.dashboard') }}">Dashborad</a>
        <a href="{{ route('blogs.note') }}">Notes</a>

        @if (session()->get('role') == 'owner')
        <a href="{{ route('blogs.user') }}">Users</a>
        @endif

        <a href="{{ route('blogs.logout') }}">Logout</a>
    @else
        <a href="{{ route('blogs.login') }}">Login</a>
    @endif
</div>

<div id="content">

    @yield('content')

</div>

<div id="footer">
    (C) Footer
</div>

</body>
</html>