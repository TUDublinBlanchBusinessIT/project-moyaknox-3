<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floral Meath</title>
    <!-- Bootstrap or Bootswatch link -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.0/dist/cosmo/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


</head>
<body class="d-flex flex-column min-vh-100"> {{-- Make body full height & flex column --}}

    {{-- Pink Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ff69b4;">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Floral Meath</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('customers.index') }}">Customers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('florists.index') }}">Florists</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bouquets.index') }}">Bouquets</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bouquets.shop') }}">Shop</a></li>
                </ul>

                

                <form action="{{ route('bouquets.search') }}" method="GET" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search bouquets..." aria-label="Search">
                    <button class="btn btn-light" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>


                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="container flex-grow-1 py-4">
        @yield('content')
    </main>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const toastEl = document.querySelector('.toast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, {
                    autohide: true,
                    delay: 3000
                });
                toast.show();
            }
        });
    </script>



    {{-- Optional sticky footer --}}
    <footer class="text-center py-3 mt-auto" style="background-color: #f8f9fa;">
        <small>&copy; {{ date('Y') }} Floral Meath. All rights reserved.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @if(session('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast align-items-center text-white bg-success border-0" role="alert" id="loginToast">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

</body>
</html>
