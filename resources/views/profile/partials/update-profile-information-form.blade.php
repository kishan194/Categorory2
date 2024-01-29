<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        section {
            background-color: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header.container {
            text-align: center;
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 15px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .mt-2 {
            margin-top: 8px;
        }

        .mt-6 {
            margin-top: 24px;
        }

        .space-y-6 > * {
            margin-bottom: 24px;
        }

        .flex {
            display: flex;
            align-items: center;
        }

        .gap-4 {
            gap: 16px;
        }

        .underline {
            text-decoration: underline;
        }

        .text-gray-600 {
            color: #666;
        }

        .text-gray-800 {
            color: #333;
        }

        .text-green-600 {
            color: #4caf50;
        }

        .focus\:outline-none:focus {
            outline: none;
        }

        .focus\:ring-2:focus {
            box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.5);
        }
    </style>
</head>

<body>

    <section>
        <header class="container">
            <h2 class="">
                Profile Information
            </h2>
            <p class="">
                Update your account's profile information and email address.
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

           <div>
    <label for="name">Name</label>
    <input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
    @if ($errors->has('name'))
        <div class="mt-2 text-red-500">
            {{ $errors->first('name') }}
        </div>
    @endif
</div>

<div>
    <label for="email">Email</label>
    <input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email', $user->email) }}" required autocomplete="username" />
    @if ($errors->has('email'))
        <div class="mt-2 text-red-500">
            {{ $errors->first('email') }}
        </div>
    @endif
</div>

                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        Your email address is unverified.
                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    <p class="mt-2 font-medium text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </p>
               
            </div>

            <div class="flex items-center gap-4">
                <button>Save</button>

                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                    Saved.
                </p>
            </div>
        </form>
    </section>

</body>

</html>
