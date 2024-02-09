<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @yield('title')
     <link rel="stylesheet" href="{{ asset('css/index.css') }}"  type="text/css">
     <link rel="stylesheet" href="{{ asset('css/footer.css') }}"  type="text/css">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      
     @yield("addstyle")
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
</head>
<body>
  <style>
      *{
        margin:0px;
      }
        </style>
        <header>
        <nav>
        <div class="header">
    <div class="dropdown">
         @yield('link')
    </div>
         
   <!-- Settings Dropdown -->
@if(Auth::check())
    <div class="dropdown-container">
        <button class="dropdown-btn btn" type="button">
            <div class="user-container">{{ Auth::user()->name }}</div>
        </button>

        <div class="profile-container">
            <a href="{{ route('profile.edit') }}" class="profile-btn dropdown-item">{{ __('Profile') }}</a>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
            </form>
        </div>
    </div>
    @else
    <!-- Render something else if the user is not logged in -->
    <div class="not-logged-in-message">
        E-commerce website 
    </div>
@endif


    </nav>    
    </header>
    <a href="{{url('categories/create')}}" class="btn btn-success mb-2">Create Parent Category</a>
    <a href="{{url('subcategories/create')}}" class="btn btn-primary mb-2">Create Subcategory</a>
    <a href="{{url('subcategories')}}"class="btn btn-primary mb-2">View Subcategory</a>
     <a href="{{url('product/create')}}" class="btn btn-secondary mb-2">Create Product</a>
     <a href="{{url('product')}}" class="btn btn-secondary mb-2">View Product</a>
    
     

    

   

    <table class="table">
           @yield('table')
    </table>

    <footer id="footer"> 
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
          <p><u><a href="https://github.com/kishan194/Categorory2.git">GitHub:Link</a></u>Of Category,Subcategory,Products With Authentication</p>
          <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Kishan Baraiya</a></p>
        </div>
      </div>  
  </footer>
</body>
</html>
