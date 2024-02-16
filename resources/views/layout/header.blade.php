<head>
               <link rel="stylesheet" href="{{ asset('css/index.css') }}"  type="text/css">

</head> 
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

 
</div>
    </nav>    
    <a href="{{url('categories/create')}}" class="btn btn-success mb-2">Create Parent Category</a>
    <a href="{{url('subcategories/create')}}" class="btn btn-primary mb-2">Create Subcategory</a>
    <a href="{{url('subcategories')}}"class="btn btn-primary mb-2">View Subcategory</a>
     <a href="{{url('product/create')}}" class="btn btn-secondary mb-2">Create Product</a>
     <a href="{{url('product')}}" class="btn btn-secondary mb-2">View Product</a>
    
    </header>