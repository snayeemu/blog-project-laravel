<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    @auth
        <div style="border: 3px solid black;">
            {{-- <h2>All Posts</h2> --}}

            <div class="bg-light pt-4 px-4 m-3 rounded">
                <h1 class="fw-bold fs-1 mb-0 ">How To Start A Blog In 2024</h1>
                <p class="mt-0 text-secondary fw-lighter mb-1">by Shaikh Nayeem Uddin</p>
                <hr class="bg-secondary my-0">
                <p class="mt-1 text-secondary fw-lighter mb-1">Updated December 24th, 2023</p>
                <p class="fs-5">Are you looking for an easy guide on how to start a blog?<br><br>

                    The step-by-step guide on this page will show you how to create a blog in 20 minutes with just the most
                    basic computer skills. <br><br>

                    After completing this guide you will have a beautiful blog that is ready to share with the world.
                    <br><br>

                    This guide is made especially for beginners. I will walk you through each and every step, using plenty
                    of pictures and videos to make it all perfectly clear. <br><br>

                    If you get stuck or have questions at any point, simply send me a message and I will do my best to help
                    you out.
                </p>

                <div class="d-flex gap-2 mb-0 ">
                    <p class="btn btn-sm btn-warning mb-0"><a class="text-white text-decoration-none"
                            href="">Edit</a></p>
                    <form class="mb-0" action="" method="">
                        @csrf
                        <button class="btn btn-sm btn-danger ">Delete</button>
                    </form>
                </div>
                <p class="mt-0 text-secondary fw-lighter pb-2">This actions only available for your own posts.</p>
            </div>

            <div class="bg-light pt-4 px-4 m-3 rounded">
                <h1 class="fw-bold fs-1 mb-0 ">How to Start a Blog That Makes You Money</h1>
                <p class="mt-0 text-secondary fw-lighter mb-1">by Asifur Rahman</p>
                <hr class="bg-secondary my-0">
                <p class="mt-1 text-secondary fw-lighter mb-1">Updated December 25th, 2023</p>
                <p class="fs-5">Anyone can start a blog that makes money. Seriously. <br><br>

                    Some of you can even generate enough money from your blog to quit your job.<br><br>

                    Don’t believe me?<br><br>

                    My blog gets over 2,436,100 visitors annually and generates more than one million dollars in revenue.
                </p>

                <div class="d-flex gap-2 mb-0 ">
                    <p class="btn btn-sm btn-warning mb-0"><a class="text-white text-decoration-none"
                            href="">Edit</a></p>
                    <form class="mb-0" action="" method="">
                        @csrf
                        <button class="btn btn-sm btn-danger ">Delete</button>
                    </form>
                </div>
                <p class="mt-0 text-secondary fw-lighter pb-2">This actions only available for your own posts.</p>
            </div>

            @foreach ($posts as $post)
                <div class="bg-light pt-4 px-4 m-3 rounded">
                    <h1 class="fw-bold fs-1 mb-0 ">{{ $post['title'] }}</h1>
                    <p class="mt-0 text-secondary fw-lighter mb-1">by {{ $post->user->name }}</p>
                    <hr class="bg-secondary my-0">
                    <p class="mt-1 text-secondary fw-lighter mb-1">Updated at {{ $post->updated_at }}</p>
                    <p class="fs-5">{{ $post['body'] }}</p>

                    <div class="d-flex gap-2 mb-0 ">
                        <p class="btn btn-sm btn-warning mb-0"><a class="text-white text-decoration-none"
                                href="/edit-post/{{ $post->id }}">Edit</a></p>
                        <form class="mb-0" action="/delete-post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger ">Delete</button>
                        </form>
                    </div>
                    <p class="mt-0 text-secondary fw-lighter pb-2">This actions only available for your own posts.</p>
                </div>
            @endforeach


        </div>

        <div style="border: 3px solid black;" class="pt-3 mt-5">
            <h2 class="ms-3">Create a New Post:</h2>
            {{-- <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="post title">
                <textarea name="body" placeholder="body content..."></textarea>
                <button>Save Post</button>
            </form> --}}

            <form action="/create-post" method="POST" class="w-75 mx-auto">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                        placeholder="Post Title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" placeholder="body content..."
                        rows="3"></textarea>
                </div>
                <button class="btn btn-primary">Save Post</button>
            </form>
        </div>




        <div class="alert alert-success" role="alert">
            Congrats you are logged in.
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger">Log out</button>
            </form>
        </div>
    @else
        {{-- <div style="border: 3px solid black;">
    <h2>Register</h2>
    <form action="/register" method="POST">
      @csrf
      <input name="name" type="text" placeholder="name">
      <input name="email" type="text" placeholder="email">
      <input name="password" type="password" placeholder="password">
      <button>Register</button>
    </form>
  </div> --}}


        <div class="w-50 mx-auto border border-black rounded p-2 m-3">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="name" class="form-control mb-2" id="exampleInputEmail1"
                        aria-describedby="emailHelp">

                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name='password' class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <p class="text-secondary">Already have an account? Please <a class="text-decoration-none"
                    href="/login">login</a></p>
        </div>

        {{-- <div style="border: 3px solid black;">
    <h2>Login</h2>
    <form action="/login" method="POST">
      @csrf
      <input name="loginname" type="text" placeholder="name">
      <input name="loginpassword" type="password" placeholder="password">
      <button>Log in</button>
    </form>
  </div> --}}



    @endauth

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
