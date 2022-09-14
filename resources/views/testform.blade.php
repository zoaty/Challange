<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GeekyPay</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
    <body>

    <div>
        <nav class="navbar navbar-expand-lg mb-4 h1 sticky-top" style="background-color: #e3f2fd;">
            <div class="container-fluid">

                <a class="navbar-brand " href="{{ route('show.home') }}" >
                    <img src="{{ asset('img/brand-logo.png') }}" alt="brand-logo" style="height: 50px; width: 75px;">
                    GeekyPay
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('show.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('show.testform') }}">Test Form</a>
                        </li>
                        @if (Auth::check())

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('show.account') }}">Account</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
                            </li>

                        @endif
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>

                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>

        <section>
            <div class="container">
                <div class="d-flex vh-100 justify-content-center align-items-center">
                    <div class="row">
                        <div class="col bg-image d-flex flex-column justify-content-center align-items-center p-5" style="background-image: url('https://img.freepik.com/free-vector/abstract-green-black-fluid-background-textured-pattern-your-backgrounds_518299-852.jpg'); background-size: 100% 100%;">
                            <h1 class="fw-bold mb-3" style="color: white;">WELCOME TO GEEKSY PAY</h1>
                            <h3 class="fw-bold mb-5" style="color: white">THANK YOU FOR CHOOSING US</h3>
                            <p class="fw-bold text-center" style="color: white; font-size: 24px">We value our customers and provide high quality services in online banking industry according to their needs.</p>
                        </div>

                        <div class="col d-flex flex-column justify-content-center align-items-center fs-5 bg-success bg-gradient p-5">

                            <form action="" method="post">
                                <div class="w-100 mb-3 text-muted fw-bold">
                                    <label for="fname" class="fs-3">Personal Information</label>
                                </div>

                                <div class="d-flex">
                                    <input type="text" class="border border-3 border-dark border-start-0 border-top-0 border-end-0 rounded-3 me-4" id="fname" name="fname" placeholder="Name">
                                    <input type="text"class="border border-3 border-dark border-start-0 border-top-0 border-end-0 rounded-3 me-4" id="lname" name="lname" placeholder="Surname">
                                </div>

                                <div class="mt-3">
                                    <input type="text"class="border border-3 border-dark border-start-0 border-top-0 border-end-0 rounded-3" id="age" name="age" placeholder="Age">
                                </div>

                                <div class="w-100 mb-3 mt-4 text-muted fw-bold">
                                    <label for="fname" class="fs-3">Website Credentials</label>
                                </div>

                                <div class="d-flex flex-column">
                                    <div>
                                        <input type="text" class="border border-3 border-dark border-start-0 border-top-0 border-end-0 rounded-3" id="username" name="username" placeholder="Username">
                                    </div>

                                    <div class="mt-3">
                                        <input type="text" class="border border-3 border-dark border-start-0 border-top-0 border-end-0 rounded-3" id="email" name="email" placeholder="Email">
                                    </div>

                                    <div class="mt-3">
                                        <input type="text" class="border border-3 border-dark border-start-0 border-top-0 border-end-0 rounded-3 me-4" id="password" name="password" placeholder="Password">
                                        <input type="text" class="border border-3 border-dark border-start-0 border-top-0 border-end-0 rounded-3" id="repeat-password" name="repeat-password" placeholder="Repeat Password">
                                    </div>

                                    <div class="mt-4 d-flex flex-column justify-content-center align-items-center">
                                        <button type="submit" class="btn btn-primary btn-lg mb-2">Register</button>
                                        <span>Have an account? <a href="#" class="text-decoration-none fw-semibold">SIGN IN!</a> </span>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>






        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </body>
</html>
