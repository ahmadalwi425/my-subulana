<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div>Register</div>

                    <div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div>
                                <label for="name">Name</label>

                                <div>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="email">Email Address</label>

                                <div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="password">Password</label>

                                <div>
                                    <input id="password" type="password" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="password-confirm">Confirm Password</label>

                                <div>
                                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div>
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
