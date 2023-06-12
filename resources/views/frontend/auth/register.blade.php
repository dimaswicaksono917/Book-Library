@extends('layouts.frontend.auth')
@section('content')

    <body>
        <section>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {{-- background --}}
            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>
            {{-- end bakground --}}
            {{-- form --}}
            <form action="{{ route('postregister') }}" method="post">
                <h3>Register Here</h3>
                @csrf
                <div class="auth-form">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <label for="username">Username</label>
                            <input type="text" name="username" placeholder="Username" id="username">

                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Password" id="password">

                            <label for="phone">Number Phone</label>
                            <input type="number" name="phone" placeholder="Number Phone" id="phone">
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" cols="90" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="action-form">
                        <button>Register</button>
                        <h5>Have Account ? <span><a href="login">Login</a></span></h5>
                    </div>
                </div>
            </form>
            {{-- end form --}}
        </section>
    @endsection
