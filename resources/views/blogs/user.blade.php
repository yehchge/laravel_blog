@extends('blogs.layout')

@section('content')

<h1>User</h1>

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

<form method="POST" action="{{ route('blogs.user_add') }}">
    @csrf

    <label>Login</label><input type="text" name="login" /><br />
    <label>Password</label><input type="text" name="password" /><br />
    <label>Role</label>
        <select name="role">
            <option value="default">Default</option>
            <option value="admin">Admin</option>
        </select><br />
    <label>&nbsp;</label><input type="submit" />
</form>

<hr />

<table>
@foreach ($userList as $value)
    <tr>
        <td>{{ $value->userid }}</td>
        <td>{{ $value->login }}</td>
        <td>{{ $value->role }}</td>
        <td><a href="{{ route('blogs.user_edit', $value->userid) }}">Edit</a></td>
        <td><a class='delete' href="{{ route('blogs.user_del', $value->userid) }}">Delete</a></td>
    </tr>
@endforeach
</table>

<script>
$(function() {

    $('.delete').click(function(e) {
        var c = confirm("Are You sure you want to delete?");
        if (c == false) return false;
    });

});
</script>

@endsection