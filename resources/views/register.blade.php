<!DOCTYPE html>
<html lang="en">

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

<body>

    <div class="form-bg d-flex justify-content-center mx-5 my-5 px-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
                    <div class="form-container">

                        <!-- Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- /Errors -->

                        <form class="form-horizontal" action="{{ route('storeregister') }}" method="POST">
                            @csrf

                            <h3 class="title">Register</h3>
                            <span class="description">To Toiro</span>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" name="name" id="name" type="name" placeholder="enter name...">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" name="email" id="email" type="email" placeholder="enter email...">
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
