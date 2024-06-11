<header class="lt_rt_wrapper justify-content-between">
    <div class="left_area">
        <div class="searchField">
        <input type="text" class="form-control shadow-none" placeholder="Search here..." id="mainSearch">
        <span class="searchIcon"><i class="bi bi-search"></i></span>
        </div>
    </div>
    <div class="right_area">
        <div class="dropdown">
            <button class="btn custom-outline dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="count">10</span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javaScript:void(0)">Notification list one</a></li>
                <li><a class="dropdown-item" href="javaScript:void(0)">Notification list two</a></li>
                <li><a class="dropdown-item" href="javaScript:void(0)">Notification list three</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn custom-outline dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-envelope"></i>
                <span class="count">2</span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javaScript:void(0)">Email List one</a></li>
                <li><a class="dropdown-item" href="javaScript:void(0)">Email List two</a></li>
                <li><a class="dropdown-item" href="javaScript:void(0)">Email List three</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <div class="btn custom-outline dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <img src="./assets/img/Surya-Avatar.png" alt="Surya-Avatar">
            </div>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javaScript:void(0)">Hello, {{Auth::guard('admin')->user()->name}}</a></li>
                <li><a class="dropdown-item" href="javaScript:void(0)">Settings</a></li>
                <li><a class="dropdown-item" href="{{Route ('admin.logout')}}">Log Out</a></li>
            </ul>
        </div>
    </div>
</header>