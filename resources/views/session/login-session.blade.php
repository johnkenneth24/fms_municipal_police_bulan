@extends('layouts.user_type.guest')

@push('links')
    <style>
        .background-login {
            height: 100vh;
            width: 100vw;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(6, 6, 6, 0.5)), url("{{ asset('assets/img/pnp-bg.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .card-login {
            width: 350px;
            border: solid 1px #000000;
            padding: 20px;
            border-radius: 8px;
            /* From https://css.glass */
            background: rgba(255, 255, 255, 0.19);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            font-family: 'Roboto', sans-serif;
        }

        .login-img-logo {
            margin: auto;
            align-items: center;
            justify-content: center;
            padding: 10px;
            display: flex;
        }
    </style>
@endpush

@section('content')
    <div class="background-login">
        <div class="card-login">
            <div class="login-img-logo mb-2">
                <img src="{{ asset('assets/img/pnplogo.png') }}" height="120">
                <img src="{{ asset('assets/img/bmps.png') }}" height="130">
            </div>
            <h4 class="text-center text-nowrap text-white mb-0"><b>FILE MANAGEMENT SYSTEM</b></h4>
            <h3 class="text-center text-white">BULAN MPS</h3>
            <form role="form" method="POST" action="/session">
                @csrf
                <label class="text-white font-weight-light">Email</label>
                <div class="mb-3">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                        value="" aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <label class="text-white font-weight-light">Password</label>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                        value="" aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info text-white h6 pt-1 pb-1 w-100 mt-2 mb-0">Sign
                        in</button>
                </div>
            </form>
        </div>
    </div>
@endsection
