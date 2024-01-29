
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{asset('css/register.css')}}">
     <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <title>User Registration</title>
</head>
<body>
<div class="container">
    <div class="title">Registration</div>
    <div class="content">
<form method="POST" action="{{ route('admin.register') }}" enctype="multipart/form-data">
    @csrf
     <div class="user-details">
      <!-- Name -->
    <div class="input-box">
        <span class="details">Name</span>
        <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
        @error('name')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email Address -->
    <div class="input-box">
         <span class="details">Email</span>
        <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
        @error('email')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <!-- Password -->
    <div class="input-box">
         <span class="details">Password</span>
        <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        @error('password')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admin.login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="btn btn-success">  Submit  <button>
        </div>
    </form>
    </body>
    </html>

