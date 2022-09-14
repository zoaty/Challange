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

        <style>
            input[type='number'] {
                -moz-appearance:textfield;
            }

            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
            }

        </style>
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
                <div class="row">
                    <div class="col bg-primary bg-gradient p-3 rounded-pill">
                        <div class="d-flex">
                            <img class="align-self-start rounded-circle" style="width: 25%; height: 25%" src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_1280.png" alt="pfp">

                            <div>
                                <h1 class="ms-3">{{ Auth::user()->userName}}</h1>
                                <h1 class="ms-3">{{ Auth::user()->customerType}}</h1>
                                <h1 class="ms-3">Customer Since {{ Auth::user()->created_at}}</h1>
                                <h1 class="ms-3 mt-5">Email: {{ Auth::user()->userEmail}}</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col bg-info bg-gradient rounded-5 me-2">
                        <!-- Tabs navs -->
                        <ul class="nav nav-tabs mb-3 ms-2 mt-2 h1" id="ex1" role="tablist">
                            <li class="nav-item me-2" role="presentation">
                                <a
                                    class="nav-link rounded-4 active"
                                    id="ex1-tab-1"
                                    data-bs-toggle="tab"
                                    href="#ex1-tabs-1"
                                    role="tab"
                                    aria-controls="ex1-tabs-1"
                                    aria-selected="true"
                                >Balances</a
                                >
                            </li>

                            <li class="nav-item me-2" role="presentation">
                                <a
                                    class="nav-link rounded-4"
                                    id="ex1-tab-2"
                                    data-bs-toggle="tab"
                                    href="#ex1-tabs-2"
                                    role="tab"
                                    aria-controls="ex1-tabs-2"
                                    aria-selected="false"
                                >Tab 2</a
                                >
                            </li>

                            <li class="nav-item me-2" role="presentation">
                                <a
                                    class="nav-link rounded-4"
                                    id="ex1-tab-3"
                                    data-bs-toggle="tab"
                                    href="#ex1-tabs-3"
                                    role="tab"
                                    aria-controls="ex1-tabs-3"
                                    aria-selected="false"
                                >Tab 3</a
                                >
                            </li>

                            <li class="ms-auto me-2">
                                @if (Auth::check())
                                    <a class="btn bg-warning rounded-4" href="{{ route('user.logout') }}"><h1>Log out</h1></a>
                                @endif
                            </li>
                        </ul>
                        <!-- Tabs navs -->

                        <!-- Tabs content -->
                        <div class="tab-content h3" id="ex1-content">
                            <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                <div class="row">
                                    <div class="col-7">
                                        @php
                                            $balance_check = Auth::user()->Balance_Is_Set
                                        @endphp

                                        @if( $balance_check == false )
                                            <form action=" {{ route( 'add.balance.account' ) }}" method="POST">
                                                @csrf
                                                <div>
                                                    <input type="text" name="customerName" placeholder="Your Name">
                                                    <input type="text" name="customerSurname" placeholder="Your Surname">
                                                </div>

                                                <div class="mt-2">
                                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="addHyphen(this)" maxlength="19" oninput="this.value=this.value.slice(0,this.maxLength)" name="cardNumber" id="cardNumber" placeholder="Card Number">
                                                </div>

                                                <div class="mt-2">
                                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9./]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="addSlash(this)" maxlength="5" name="expiryDate" id="expiryDate" placeholder="Expiry Date">
                                                    <input type="number" maxlength="3" oninput="this.value=this.value.slice(0,this.maxLength)" name="CCV" id="CCV" placeholder="CCV">
                                                </div>

                                                    <button type="submit" class="btn btn-primary btn-lg mt-2">Create Balance Account</button>
                                            </form>
                                        @else
                                            <div class="d-flex">
                                                <h1 class="me-5">Database Balance: {{ Auth::user()->balance->user_balance }}</h1>

                                                <form action="{{ route('user.withdraw') }}" method="POST">
                                                    @csrf

                                                    <input type="number" name="withdrawBalance" id="withdrawBalance" placeholder="Amount">
                                                    <button type="submit" class="btn btn-primary btn-lg">Withdraw</button>
                                                </form>
                                            </div>

                                            <div class="d-flex">

                                                <h1 class="me-5">Database Balance: {{ Auth::user()->balance->user_balance }}</h1>

                                                <form action="{{ route('user.add') }}" method="POST">
                                                    @csrf

                                                    <input type="number" name="addBalance" id="addBalance" placeholder="Amount">
                                                    <button type="submit" class="btn btn-primary btn-lg">Add</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                    <div class=" col">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <h5><li class="mt-2">{{ $error }}</li></h5>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>


                            </div>

                            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                Tab 2 content
                            </div>

                            <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                Tab 3 content
                            </div>
                        </div>
                        <!-- Tabs content -->
                    </div>
                </div>
            </div>
        </section>

        <script>
            function addHyphen (element) {
                let ele = document.getElementById(element.id);
                ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.

                let finalVal = ele.match(/.{1,4}/g).join('-');
                document.getElementById(element.id).value = finalVal;
            }

            function addSlash (element) {
                let ele = document.getElementById(element.id);
                ele = ele.value.split('/').join('');    // Remove dash (/) if mistakenly entered.

                let finalVal = ele.match(/.{1,2}/g).join('/');
                document.getElementById(element.id).value = finalVal;
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        </script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>

</html>
