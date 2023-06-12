@extends('layouts.frontend.auth')
@section('content')

    <body>
        <section>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- background --}}
            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>
            {{-- end bakground --}}
            {{-- form --}}
            <form action="{{ route('postlogin') }}" method="post">
                <h3>Login Here</h3>
                @csrf
                <div class="auth-form">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username" id="username" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" id="password" required>
                    <div class="action-form">
                        <button>Log In</button>
                        <h5>Not Have Account ? <span><a href="register">Register</a></span></h5>
                    </div>
                </div>
            </form>
            {{-- end form --}}




        </section>
    @endsection
