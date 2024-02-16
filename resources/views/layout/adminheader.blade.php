<head>
               <link rel="stylesheet" href="{{ asset('css/index.css') }}"  type="text/css">

</head> 
 <header>
        <nav>
        <div class="header">
    <div class="dropdown">
         @yield('link')
    </div>
         
 <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('admin.dashboard') }}" class="btn">
                                        DashBoard
                    </a>
   <!-- Settings Dropdown -->
<div class="dropdown-container">
    <button class="dropdown-btn btn" type="button">
        <div class="user-container">{{ Auth::guard('admin')->user()->name}}</div>
    </button>

    <div class="profile-container">
        <a href="{{ route('profile.edit') }}" class="profile-btn dropdown-item">Profile</a>
        <!-- Authentication -->
        <form method="POST" action="{{route('admin.logout') }}">
            @csrf  
          <button type="submit">Logout</button>
        </form>
    </div>
</div>

 
</div>
    </nav>  
        <a href="{{url('categories/create')}}" class="btn btn-success mb-2">Create Parent Category</a>
    <a href="{{url('subcategories/create')}}" class="btn btn-primary mb-2">Create Subcategory</a>
    <a href="{{url('subcategories')}}"class="btn btn-primary mb-2">View Subcategory</a>
     <a href="{{url('product/create')}}" class="btn btn-secondary mb-2">Create Product</a>
     <a href="{{url('product')}}" class="btn btn-secondary mb-2">View Product</a>
    
          
    </header>