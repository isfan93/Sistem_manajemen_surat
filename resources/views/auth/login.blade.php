<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/main.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
      
          <!-- Icon -->
          <div class="fadeIn first">
            <img src="assets/img/calmdev.png" id="icon" alt="User Icon" />
          </div>
      
          <!-- Login Form -->
          <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
              {{-- <label for="email" class="form-label">Email address</label> --}}
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                     name="email" placeholder="email" value="{{ old('email') }}">
              @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="mb-3">
            {{-- <label for="password" class="form-label">Password</label> --}}
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
            <input type="submit" class="fadeIn fourth" value="Log In">
            {{-- <a href="/error404">Error</a> --}}
          </form>
      
          <!-- Remind Passowrd -->
          {{-- <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
          </div> --}}
      
        </div>
      </div>
      <div id="preloader"></div>
</body>
</html>