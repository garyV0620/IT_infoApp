
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laratunes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    {{-- navbar --}}
    @auth
        <nav class="navbar navbar-expand-lg navbar-light p-2">
            <div class="container">
                <a href="{{ route('dashboard') }}" class="navbar-brand">IT Crew App</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <i class="fa-regular fa-user text-danger"></i> {{ auth()->user()->username }}
                        </li>
                    </ul>

                    <ul class="navbar-nav mb-2 mb-lg-0">
                        
                        <li class="nav-item ms-5">
                            <a class=" btn btn-success" aria-current="page" href="{{ route('userList') }}">Admin Users</a>
                        </li>
                        <li class="nav-item ms-5">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endauth
    

    {{-- flash messages--}}
    @include("partials/flash-message")

      {{-- content --}}
      <main>
            {{ $slot }}
      </main>
      @auth
        {{-- footer --}}
        <footer class="p-5 text-center text-white" style="background-color: #333">
            <p>All rights reserved. &copy; 2023</p>
        </footer>
      @endauth
    

    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   
    {{-- alpine js  --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    </body>
</html>
