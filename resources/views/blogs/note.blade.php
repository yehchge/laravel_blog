@extends('blogs.layout')

@section('content')

<h1>Note</h1>

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

<form method="POST" action="{{ route('blogs.create') }}">
    @csrf

    <label>title</label><input type="text" name="title" /><br />
    <label>content</label><textarea name="content"></textarea><br />
    <label>&nbsp;</label><input type="submit" />
</form>

<hr />

<table>
@foreach ($noteList as $value)
    <tr>
        <td>{{ $value->title }}</td>
        <td>{{ $value->created_at }}</td>
        <td><a href="{{ route('blogs.edit', $value->noteid) }}">Edit</a></td>
        <td><a class='delete' href="{{ route('blogs.delete', $value->noteid) }}">Delete</a></td>
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