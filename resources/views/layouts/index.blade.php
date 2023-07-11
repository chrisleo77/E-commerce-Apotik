<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ApotekU</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- <script src="{{ asset('js/jquery.js') }}"></script> --}}

    <!-- Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    {{-- <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <!-- style="min-height: 70px;" -->
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">ApotekU</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Produk</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> --}}
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="dropdown">
                        <button type="button" class="btn mr-sm-2" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i><span
                                class="badge badge-pill badge-danger"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" style="width: 260px; padding: 10px;">
                            @if (session('cart'))
                                <?php $total = 0; ?>
                                @foreach (session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity']; ?>
                                @endforeach
                                <div class="row total-header-section">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><span
                                            class="badge badge-pill badge-danger"></span>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                        <p>Total: <span class="text-info">{{ $total }}</span></p>
                                    </div>
                                </div>
                                @foreach (session('cart') as $id => $details)
                                    <div class="row cart-detail">
                                        <div class="col-lg-3 col-sm-3 col-3 cart-detail-img">
                                            <img src="{{ asset('images/' . $details['photo']) }}" width="60"
                                                height="60">
                                        </div>
                                        <div class="col-lg-9 col-sm-9 col-9 cart-detail-product">
                                            <p>{{ $details['name'] }}</p>
                                            <span class="price text-info">Rp. {{ $details['price'] }}</span><span
                                                class="count" style="float:right;">{{ $details['quantity'] }}x</span>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ url('cart') }}" class="btn btn-dark btn-block">Lihat Semuanya</a>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout mt-3">
                                        <p>Keranjang Anda kosong</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @guest
                        {{-- <a class="btn btn-outline-dark mr-sm-2" href="{{ url('/login') }}">Login</a> --}}
                        <a class="btn btn-outline-dark mr-sm-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        {{-- <a class="btn btn-dark mr-sm-2" href="{{ url('/register') }}">Register</a> --}}
                        @if (Route::has('register'))
                            <a class="btn btn-dark mr-sm-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <div class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/transaksi') }}">Riwayat Pembelian</a>
                                <hr>
                                <a class="dropdown-item" href="/keluar">Logout</a>
                                {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form> --}}

                            </div>
                        </div>
                    @endguest
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('container')
    </div>

    <br><br><br>
    @yield('modal')

    @yield('scripts')
</body>

</html>
