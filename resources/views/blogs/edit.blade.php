@extends('blogs.layout')

@section('content')

<h1>Note: Edit</h1>

<form method="POST" action="{{ route('blogs.editSave',$blogRow->noteid) }}">
    @csrf

    <label>Title</label><input type="text" name="title" value="{{ $blogRow->title }}" /><br />
    <label>Content</label><textarea name="content">{{ $blogRow->content }}</textarea><br />
    <label>&nbsp;</label><input type="submit" />
</form>

@endsection
