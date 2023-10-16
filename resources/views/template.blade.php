<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Toiro</title>

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Toiro</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    {{-- <li class="nav-item"><a class="nav-link" href="#">Todo</a></li> --}}
                    {{-- <li class="nav-item"><a class="nav-link" href="#popup-profile">{{ auth()->user()->name }}</a></li> --}}
                    <a class="nav-link" href="#popup-profile">
                        {{ auth()->user()->name }}
                        <i class="fas fa-user"></i>
                    </a>
                    {{-- <li class="nav-item"><a class="nav-link" href="#todo">Todo</a></li> --}}

                    <!-- Modal -->
                    <div id="popup-profile" class="overlay" style="z-index: 9999">
                        <a class="cancel" href="#"></a>

                        <div class="popup bg-dark text-white text-center">
                            <h2 class="mt-3">Do you want to Logout?</h2>

                            <div class="content">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <div class="form-group my-3">
                                        <a href="#" class="btn btn-outline-danger" type="button">No</a>
                                        {{-- <input class="btn btn-outline-danger" type="button" value="No"> --}}
                                        <input class="btn btn-outline-success" type="submit" value="Yes">
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- /Modal -->

                </ul>
            </div>

        </div>
    </nav>

    @yield('content')

    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Toiro 2023</div>
    </footer>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
</body>

</html>
