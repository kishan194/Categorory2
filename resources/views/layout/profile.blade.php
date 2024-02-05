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