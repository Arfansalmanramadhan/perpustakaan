<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan | register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/daftar.css')}}">
</head>
<body class="register">
    <main class="main container d-flex justify-content-center align-items-center">
      <section class="container md row">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if (session('status'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
                @endif 
                <div class="kontak">
                <h2 class="mx-4">Registasi</h2>
                <form action="" method="post">
                    @csrf
                    <div class="mb-3 mx-auto p-2 row ">
                      <label for="username" class="col-sm-2 form-label">Usename</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" id="username"  name="username">
                      </div>
                    </div>
                    <div class="mb-3 mx-auto p-2 row ">
                      <label for="password" class="col-sm-2 form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                      </div>
                    </div>
                    <div class="mb-3 mx-auto p-2 row ">
                      <label for="phone" class="col-sm-2 form-label">Phone</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" id="phone" name="phone">
                      </div>
                    </div>
                    <div class="mb-3 mx-auto p-2 row ">
                      <label for="address" class="col-sm-2 form-label">Address</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="address" required name="address" cols="10" rows="0"></textarea>
                      </div>
                    </div>
                      <div class="mb-2">
                        <button type="submit" class="btn btn-primary mx-3">register</button>
                        <a href="login" class="btn btn-primary mx-2">Login</a>
                      </div>
                </form>
              </div>
             
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>