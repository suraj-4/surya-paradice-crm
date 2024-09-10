<header>
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand me-0" href="{{Route ('home')}}">
                    <img src="./assets/img/hotel-logo.png" alt="Surya-Paradise">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{Route ('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route ('about')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route ('room')}}">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route ('contact')}}">Contact</a>
                        </li>
                    </ul>
                </div>


               <!-- Login / Sign up Button -->
                @if (!(Auth::user()))
                <div class="auth_btn_wrap">
                    <a href="{{Route ('login')}}" class="larger-btn">Login</a>
                    <a href="{{Route ('register')}}" class="larger-btn auth_btn">Register</a>
                </div>
                @else
                <div class="dropdown logout_btn_wrap">
                    <div class="btn dropdown-toggle shadow-none" type="button" data-bs-toggle="dropdown">
                        <div class="avatar">
                            <img src="./assets/img/Surya-Avatar.png" alt="Surya-Avatar">
                        </div>
                        <span>{{Auth::user()->name}}</span>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{Route ('logout')}}">Log Out</a></li>
                    </ul>
                </div>
                @endif
            </nav>
        </div>
    </header>