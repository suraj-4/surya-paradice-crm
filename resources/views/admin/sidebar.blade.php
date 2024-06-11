
<div class="sidebar">
    <nav class="navbar navbar-expand-lg flex-column">
        <div class="headerBar">
            <a class="navbar-brand me-0" href="{{route ('dashboard')}}">
                <img src="./assets/img/hotal-logo.png" alt=" Surya-Paradise">
                <span>Surya <br> Paradise</span>
            </a>
            <span class="CloseBtn"><i class="bi bi-arrow-left"></i></span>
        </div>

        <div class="sidebar_menu">
            <ul class="navbar-nav flex-column me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
                <a class="nav-link" href="{{route ('dashboard')}}">
                    <i class="bi bi-speedometer me-2"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route ('rooms')}}">
                    <i class="bi bi-house-check me-2"></i><span>Rooms</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('booking')}}">
                    <i class="bi bi-journal-bookmark-fill me-2"></i><span>Booking</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('staff')}}">
                    <i class="bi bi-people me-2"></i><span>Staff</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('reports')}}">
                    <i class="bi bi-graph-up-arrow me-2"></i><span>Report</span>
                </a>
            </li>
                            
            </ul>
            <div class="toggle_wrap"><div class="toggle"></div></div>
        </div>
    </nav>
</div>