<!DOCTYPE html>
<html>
<head>
    <title>Librarian site</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link href="{{ '/css/customStyle.css' }}" rel="stylesheet" type="text/css" >
</head>
<body class="bg-tertiarycolor">
    <nav class="navbar navbar-dark navbar-expand-lg bg-secondarycolor">
        <div class="container">
            <a class="navbar-brand" href="/">LibrarySite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
    
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Hello {{ auth()->user()->name }}!
                            </a>
                            <ul class="dropdown-menu">
    
                                {{-- @if ($user->role_id == '1') --}}
    
                                @switch(auth()->user()->role_id)
                                    @case(0)
                                    @break
    
                                    @case(1)
                                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar"></i> My
                                                Dashboard</a></li>
                                    @break
    
                                    @default
                                        <br>Error, Try Again
                                @endswitch
    
    
                                {{-- @else
                                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar"></i> My
                                    Dashboard Student</a></li>
                                @endif --}}
    
    
    
    
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right"></i> Logout</button>
                                    </form>
                                </li>
    
    
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/login" class="nav-link" {{ request()->is('login') ? 'active' : '' }}><i
                                    class="bi bi-box-arrow-in-right"></i> Login</a>
                        </li>
                    </ul>
                @endauth
    
    
    
            </div>
        </div>
    </nav>

 <!-- Page Content -->
        <main>
            
              <br>
              <br>
            <div class="container align-self-center text-maincolor">
                @yield('content')
            </div>
        
        </main>
    </body>
</html>