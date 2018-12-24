@extends('blogs.layout')

@section('content')

<h1>User: Edit</h1>

<form method="POST" action="{{ route('blogs.user_edit',$userRow->userid) }}">
    @csrf

    <label>Login</label><input type="text" name="login" value="{{ $userRow->login }}" /><br />
    <label>Password</label><input type="text" name="password" value="" /><br />
    <label>Role</label>
        <select name="role">
            <option value="default" @if ($userRow->role == 'default') selected @endif>Default</option>
            <option value="admin" @if ($userRow->role == 'admin') selected @endif>Admin</option>
            <option value="owner" @if ($userRow->role == 'owner') selected @endif>Owner</option>
        </select><br />
    <label>&nbsp;</label><input type="submit" />
</form>

@endsection
