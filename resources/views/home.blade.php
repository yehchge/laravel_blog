<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $dtitle }}</h1>
    <div>{{ link_to("post/create", "新增") }}</div>
    @if (isset($posts))
        <ol>
        @foreach($posts as $post)
            <li>{{ link_to("post/".$post->id, $post->title) }}</li>
            ({{ link_to("post/".$post->id."/edit", "編輯") }})
        @endforeach
        </ol>
    @endif
</body>
</html>