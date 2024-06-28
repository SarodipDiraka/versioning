<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="font-sans antialiased">
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            @if (Route::has('login'))
                <nav class="-mx-4 flex flex-1 justify-end">
                    <a
                            href="{{ url('/') }}"
                        >
                            Home
                    </a>
                    @auth
                        <x-app-layout>

                        </x-app-layout>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif

        </header>


        <div class="row" align="center">

            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Blog Posts</h4>
                    <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> Title </th>
                          <th> Content </th>
                          <th> User id </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{$blog->title}}</td>
                            <td>{{$blog->content}}</td>
                            <td><a href="{{url('detail', $blog->user_id)}}">{{$blog->user_id}} </a></td>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
                <h1 class="title">Create Blog Post V1</h1>

                <form action="{{url('blog/v1')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="padding-top: 15px">
                        <label>Blog title</label>
                        <input type="text" name="title" placeholder="Give a blog title" required style="color: black;">
                    <div>

                    <div style="padding-top: 15px">
                        <label>Content</label>
                        <input type="text" name="content" placeholder="Give a content" required style="color: black;">
                    <div>

                    <div style="padding-top: 15px">
                        <x-button class="ms-4">
                            <input type="submit" class="btn-close">
                        </x-button>
                    <div>
                </form>

            <div>
        </div>

        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
                <h1 class="title">Create Blog Post V2</h1>

                <form action="{{url('blog/v2')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="padding-top: 15px">
                        <label>Blog title</label>
                        <input type="text" name="title" placeholder="Give a blog title" required style="color: black;">
                    <div>

                    <div style="padding-top: 15px">
                        <label>Content</label>
                        <input type="text" name="content" placeholder="Give a content" required style="color: black;">
                    <div>

                    <div style="padding-top: 15px">
                        <x-button class="ms-4">
                            <input type="submit" class="btn-close">
                        </x-button>
                    <div>
                </form>

            <div>
        </div>
    </body>
</html>
