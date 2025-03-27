<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="header">
        <h2>Website Header</h2>
    </div>

    <div class="content">
        <h1>Login</h1>
        @if(Session::has('error'))
            <div style="color: red;">{{ Session::get('error') }}</div>
        @endif
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="captcha">Captcha:</label>
                <input type="text" name="captcha" id="captcha" required><br>
                <img src="{{ captcha_src() }}" alt="captcha" onclick="this.src='{{ captcha_src() }}'+Math.random()">
            </div>
            <div>
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>

    <div class="footer">
        <p>© {{ date('Y') }} Login Footer. All Rights Reserved.</p>
    </div>
</body>
</html>
