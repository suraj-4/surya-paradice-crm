@include('head')

<div class="auto_outer_wrap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="logo">
                    <img src="./assets/img/single-hotal-logo.png" alt="">
                </div>
            </div>
            <div class="col-6">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <div class="form_wrapper">
                    <div class="text-center mb-4 custom-bg py-2">
                        <h2>Regiter</h2>
                    </div>
                    <form action="{{ Route ('register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Username</label>
                            <input type="text" name= "name" value="{{ old ('name')}}" class="form-control shadow-none @error('name') is-invalid @enderror" id="name">
                            @error('name')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" name= "email" value="{{ old ('email')}}" class="form-control shadow-none @error('email') is-invalid @enderror" id="email">
                            @error('email')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name= "password" value="{{ old ('password')}}" class="form-control shadow-none @error('password') is-invalid @enderror" id="password">
                            @error('password')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control shadow-none" id="password_confirmation" name="password_confirmation">
                        </div>
                        <button type="submit" class="larger-btn">Register Now</button>
                    </form>
                    <div class="text-center mt-4">
                        <a href="{{ Route ('show.login.form') }}" class="text-dark decoration-none">Login Here</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('foot')