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
                        <a
                        href="{{url('detail/v2')}}"
                        >
                                My posts
                        </a>
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
                          <th> Update </th>
                          <th> Delete </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($blogs as $blog)
                        <form action="{{url('update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <tr>
                            <input type="text" name="id" value="{{$blog->id}}" hidden>
                            <td><input type="text" name="title" placeholder="{{$blog->title}}" value="{{$blog->title}}" style="color: black;"></td>
                            <td><input type="text" name="content" placeholder="{{$blog->content}}" value="{{$blog->content}}" style="color: black;"></td>
                            <td><input type="submit" class="btn-close" value="update"></td>
                        </form>
                        <form action="{{url('delete', $blog->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <td><input type="submit" class="btn-close" value="delete"></td>
                        </form>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
