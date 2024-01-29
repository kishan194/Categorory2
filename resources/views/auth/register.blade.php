
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
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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

    <!-- Phone -->
    <div class="input-box">
       <span class="details">Phone Number</span>
        <input id="phone" class="block mt-1 w-full" type="number" name="phone" value="{{ old('phone') }}" required autofocus autocomplete="phone" />
        @error('phone')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <!-- Date Of Birth -->
    <div class="input-box">
        <span class="details">Date Of Birth</span>
        <input id="dob" class="block mt-1 w-full" type="date" name="dob" value="{{ old('dob') }}" required autofocus autocomplete="dob" />
        @error('dob')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <!-- Image -->
    <div class="input-box">
        <span class="details">Image</span>
        <input id="image" class="block mt-1 w-full" type="file" name="image" value="{{ old('image') }}" required autofocus autocomplete="image" />
        @error('image')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <!-- Gender -->
    <div class="input-box">
        <span class="details">Gender</span>
        <select id="gender" name="gender" class="block mt-1 w-full">
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <!-- Address -->
    <div class="input-box">
        <label for="address">Address</label>
        <input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ old('address') }}" required autofocus autocomplete="address" />
        @error('address')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <!-- City -->
    <div class="input-box">
        <span class="details">City</span>
        <input id="city" class="block mt-1 w-full" type="text" name="city" value="{{ old('city') }}" required autofocus autocomplete="city" />
        @error('city')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <!-- State -->
    <div class="input-box">
         <span class="details">State</span>
        <input id="state" class="block mt-1 w-full" type="text" name="state" value="{{ old('state') }}" required autofocus autocomplete="state" />
        @error('state')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <!-- Country -->
    <div class="input-box">
        <span class="details">Country</span>
        <input id="country" class="block mt-1 w-full" type="text" name="country" value="{{ old('country') }}" required autofocus autocomplete="country" />
        @error('country')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <!-- Zipcode -->
    <div class="input-box">
       <span class="details">Zipcode</span>
        <input id="zipcode" class="block mt-1 w-full" type="number" name="zipcode" value="{{ old('zipcode') }}" required autofocus autocomplete="zipcode" />
        @error('zipcode')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="btn btn-success">  Submit  <button>
        </div>
    </form>
    </body>
    </html>

