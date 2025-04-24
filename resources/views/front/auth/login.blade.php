@extends('front.auth.main')

@section('content')
<section class="auth-login wf100 p100 flex items-center justify-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 bg-white p-5 shadow rounded">
                <h2 class="text-success mb-4">Login</h2>

                @if(Session::has('error'))
                    <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                @endif

                <form action="{{ url('/login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="captcha">Captcha:</label>
                        <div class="d-flex align-items-center">
                            <input type="text" name="captcha" id="captcha" class="form-control me-3" required>
                            <img src="{{ captcha_src() }}" alt="captcha" class="border rounded" style="height: 40px; cursor: pointer;" onclick="this.src='{{ captcha_src() }}'+Math.random()">
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
