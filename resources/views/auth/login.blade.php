<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<form method="POST" action="{{ route('login') }}" class="container">
    @csrf
    <div class="title">Login</div>
    <div class="content">

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="details">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            @error('email')
                <div class="mt-2 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="details">Password</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            @error('password')
                <div class="mt-2 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-group form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label ms-2 text-sm text-gray-600">Remember me</label>
        </div>

        <div class="form-group">
            @if (Route::has('password.request'))
                <a class="flink" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button class="btn btn-primary login-btn">
                {{ __('Log in') }}
            </button>
        </div>
    </div>
</form>
