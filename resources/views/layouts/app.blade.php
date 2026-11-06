<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Restaurant System') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>:root{--red:#7a1414;--orange:#ed7d31}body{background:#f7f7f7}.navbar{background:var(--red)}.btn-primary{background:var(--red);border-color:var(--red)}.hero{background:linear-gradient(110deg,#481010cc,#e77322aa),url('https://images.unsplash.com/photo-1515003197210-e0cd71810b5f?auto=format&fit=crop&w=1500&q=80') center/cover;color:white}.food-image{height:180px;object-fit:cover}.stat{border-left:4px solid var(--orange)}</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark"><div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">RESTAURANT SYSTEM</a>
    <div class="navbar-nav ms-auto align-items-lg-center">
        <a class="nav-link" href="{{ route('menu') }}">Menu</a>
        @if(auth()->check())
            @if(auth()->user()->isAdmin())
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
            @else
                <a class="nav-link" href="{{ route('cart') }}">Cart</a>
                <a class="nav-link" href="{{ route('orders') }}">Orders</a>
            @endif
            <form method="post" action="{{ route('logout') }}">@csrf<button class="btn btn-sm btn-warning ms-lg-2">Logout</button></form>
        @else
            <a class="nav-link" href="{{ route('login') }}">Login</a>
            <a class="btn btn-sm btn-warning ms-lg-2" href="{{ route('register') }}">Join us</a>
        @endif
    </div>
</div></nav>
<main class="container py-4">
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    @yield('content')
</main>
</body></html>
