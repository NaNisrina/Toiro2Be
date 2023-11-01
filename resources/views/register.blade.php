<!DOCTYPE html>
<html lang="en" style="height: 100vh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login</title>

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google fonts-->
    {{-- <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" /> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" /> --}}

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="p-5" style="height: 100vh">

    <div class="form-bg d-flex justify-content-center p-5 h-100">
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 h-100 d-flex align-items-center">
            <div class="form-container flex-fill">

                        <form class="form-horizontal" action="{{ route('storeregister') }}" method="POST">
                            @csrf
                            <h3 class="title">Register</h3>
                            <span class="description">To Toiro</span>
                            <!-- Errors -->
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ $error }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endforeach
                                @endif
                            <!-- /Errors -->

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" name="name" id="name" type="name" placeholder="enter name..." value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" name="email" id="email" type="email" placeholder="enter email..." value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" name="password" id="password" type="password" placeholder="enter password...">
                            </div>

                            <button class="btn signin" type="submit">Register</button>
                            <span class="signup">or <a href="/login">Login</a></span>
                            {{-- <span class="forgot"><a href="">Forgot Password?</a></span> --}}

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>
