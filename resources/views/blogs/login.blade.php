@extends('blogs.layout')

@section('content')

<h1>Login</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="./run" method="POST">
@csrf
    <label>Login</label><input type="text" name="login" /><br />
    <label>Password</label><input type="password" name="password" /><br />
    <label><input type="checkbox" name="remember" />Remember Me</label><br />
    <label></label>Hint: demo / demo
    <label></label><input type="submit" />
</form>

@endsection
