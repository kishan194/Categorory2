<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @yield('title')
     <link rel="stylesheet" href="{{ asset('css/index.css') }}"  type="text/css">
     @yield("addstyle")
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
</head>
<body>
  <style>
        /* Basic styling to make it look nice */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            text-decoration:none;
        }
        /* Style the parent link */
        .dropdown:hover .dropdown-content {
            display: block;
            text-decoration:none;
        }
        .header-link{
            color:white;
            text-decoration:none;
        }
        </style>
        <header>
        <nav>
        <div class="header">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="login-container">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="dashboard">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="login">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="Register">Register</a>
                        @endif
                    @endauth
            @endif
                </div>
    <a href="{{url('categories/create')}}" class="btn btn-success mb-2">Create Parent Category</a>
    <a href="{{url('subcategories/create')}}" class="btn btn-primary mb-2">Create Subcategory</a>
    <a href="{{url('subcategories')}}"class="btn btn-primary mb-2">View Subcategory</a>
     <a href="{{url('product/create')}}" class="btn btn-secondary mb-2">Create Product</a>
     <a href="{{url('product')}}" class="btn btn-secondary mb-2">View Product</a>
    <div class="dropdown">
         @yield('link')
    </div>
  
</div>
    </nav>    
    </header>
   
    <table class="table">
           @yield('table')
    </table>
</body>
</html>

