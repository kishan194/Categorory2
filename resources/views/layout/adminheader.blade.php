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
    </header>