<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    {{-- <form action="/edit-post/{{$post->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$post->title}}">
    <textarea name="body">{{$post->body}}</textarea>
    <button>Save Changes</button>
  </form> --}}

    <div style="border: 3px solid black;" class="pt-3">
        <h1 class="ms-3">Edit Post:</h1>
        {{-- <form action="/create-post" method="POST">
        @csrf
        <input type="text" name="title" placeholder="post title">
        <textarea name="body" placeholder="body content..."></textarea>
        <button>Save Post</button>
    </form> --}}

        <form action="/edit-post/{{ $post->id }}" method="POST"" class="w-75 mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control"
                    id="exampleFormControlInput1" placeholder="Post Title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea class="form-control" name="body" id="exampleFormControlTextarea1" placeholder="body content..."
                    rows="3">{{ $post->body }}</textarea>
            </div>
            <button class="btn btn-primary">Save Changes </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
