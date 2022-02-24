<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Stylesheets -->
    <script src="https://kit.fontawesome.com/70d9f29416.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    
    <title>@yield('pageTitle') | Kimono</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                Kimono
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-controls="mainNavigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav me-auto mb-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                </ul>
                
                @auth
                <div class="d-flex">
                    <ul class="navbar-nav">
                        <li class="nav-link me-3">
                            {{ auth()->user()->name }}
                        </li>
                        <li>
                            <form action="{{ route('sign-out') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-light">Sign out</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth

                @guest
                <div class="d-flex">
                    <ul class="navbar-nav">
                        <li>
                            <a href="{{ route('sign-in') }}" class="nav-link me-3">Sign in</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sign-up') }}" class="btn btn-outline-light">Sign up</a>
                        </li>
                    </ul>
                </div>
                @endguest

            </div>
        </div>
    </nav>

    <main role="main" class="bg-light py-3">
        <div class="container">
            @include('partials.alerts')
            @yield('content')  
        </div>
    </main>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 border-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="d-inline-block">© <?php echo date("Y"); ?> Kimono</p>
                    <div class="float-end">
                        <a href="https://www.twitter.com" class="text-decoration-none">
                            <i class="text-body fs-4 fab fa-twitter" aria-hidden="true"></i>
                            <span class="visually-hidden">Twitter</span>
                        </a>
                        <a href="https://www.facebook.com" class="text-decoration-none mx-3">
                            <i class="text-body fs-4 fab fa-facebook" aria-hidden="true"></i>
                            <span class="visually-hidden">Facebook</span>
                        </a>
                        <a href="https://www.instagram.com" class="text-decoration-none">
                            <i class="text-body fs-4 fab fa-instagram" aria-hidden="true"></i>
                            <span class="visually-hidden">Instagram</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></>
</body>
</html>