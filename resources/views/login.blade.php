<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .main{
            height: 100vh;
            box-sizing: border-box;
        }

    </style>
</head>
<body>
    <main class="main container d-flex flex-column justify-content-center align-items-center">
            @if (session('status'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
              @endif 
        <section class="container">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="staticUrsername" class="col-sm-2 form-label">Usename</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticUrsername"  required name="username">
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword" required name="password">
                        </div>
                      </div>
                      <div class="mb row">
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                      <div class="mb row text-center">
                        <a href="register">Sign Up</a>
                      </div>
                </form>
             
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>