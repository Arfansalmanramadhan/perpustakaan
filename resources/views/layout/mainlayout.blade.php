<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .main {
            height: 100vh;
        }
        .sidebar{
            background: rgba(18, 18, 18, 0.645)
        }
        /* .sidebar ul {
            list-style: none;
        } */

    </style>
</head>
<body>
    <main class="main d-flex flex-column justify-content-between">
            <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
                <div class="container-fluid">
                <a class="navbar-brand" href="#">Perpustakaan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                </div>
            </nav>
            <section class="body-content h-100">
                <section class="row g-0 h-100">
                    <section class="sidebar col-lg-2 collapse d-lg-block" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            {{-- {{Auth::user()->role_id == 1}} --}}
                            @if (Auth::user()->roles_id == 1)
                                
                                <li class="nav-item">
                                  <a class="nav-link active" aria-current="page" href="dashboard">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="books">buku</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">Kategori</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">Pengguna</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">Peminjam</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="logout">Keluar</a>
                                </li>
                                
                                @else     
                                <li class="nav-item">
                                  <a class="nav-link" href="profile">Profile</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="logout">Keluar</a>
                                </li>
                            @endif

                        </ul>
                    </section>
                    <section class="content p-5 col-lg-10">
                        @yield('content')
                    </section>
                </section>
            </section>
    </main>
    {{-- <section>
        @yield('content')
    </section> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>