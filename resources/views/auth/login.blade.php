<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IT CREW APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>

  <body>


    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 loginForm">
                    <h1 class="mb-3">LogIn Admin Account</h1>
                    <p class="mb-4 lead">Sign into your account</p>
                    <form method="post" action="{{ route('authenticate') }}">
                        @csrf

                        @error('invalid')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- User input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example13">User Name</label>
                            @error('username')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                      
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control form-control-lg" />
                            <label class="form-label" for="password">Password</label>
                            @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                        <div class="d-flex justify-content-around align-items-center my-4">
                            <p>Don't have an account yet? <a class="text-success" href="{{ route('userAdd') }}">Register here.</a></p>
                        </div>
            
                    </form>
                </div>
            </div>
        </div>
    </section>
  </body>
</html>