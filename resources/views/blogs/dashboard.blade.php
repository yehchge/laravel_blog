@extends('blogs.layout')

@section('content')

    Dashboard... Logged in only..

    <br />

    <form id="randomInsert" action="{{ route('blogs.xhrInsert') }}" method="post">
        @csrf

        <input type="text" name="text" />
        <input type="submit" />
    </form>

    <br />

    <div id="listInserts">

    </div>

@endsection
