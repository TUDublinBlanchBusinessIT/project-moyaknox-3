<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floral Meath</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
         <a class="navbar-brand" href="{{ url('/') }}">Floral Meath</a>
         <div class="collapse navbar-collapse">
             <ul class="navbar-nav me-auto">
                 <li class="nav-item"><a class="nav-link" href="{{ route('customers.index') }}">Customers</a></li>
                 <li class="nav-item"><a class="nav-link" href="{{ route('florists.index') }}">Florists</a></li>
                 <li class="nav-item"><a class="nav-link" href="{{ route('bouquets.index') }}">Bouquets</a></li>
                 <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>
             </ul>
         </div>
      </div>
    </nav>
    
    <main class="py-4">
        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
