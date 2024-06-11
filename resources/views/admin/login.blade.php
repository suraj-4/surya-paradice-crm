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
                <div class="form_wrapper">
                    <div class="text-center mb-4 custom-bg py-2">
                        <h2>Login</h2>
                    </div>
                    <form action="{{Route ('admin.login')}}" method="post">
                        @csrf
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
                        <button type="submit" class="larger-btn">Login Now</button>
                    </form>
                    <div class="text-center mt-4">
                        <a href="{{ Route ('show.register.form') }}" class="text-dark decoration-none">Create your account</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('foot')