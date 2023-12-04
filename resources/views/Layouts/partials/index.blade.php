<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo/logo.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            @if (auth()->check())           
            <h4 class="logo-text">Hi! {{ auth()->user()->firstName }}</h4>
            @endif
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="/dashboard">
                <div class="parent-icon"><i class='bx bx-grid-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <p></p>
        <li>
            <a href="/complain">
                <div class="parent-icon"><i class='bx bx-message-detail'></i>
                </div>
                <div class="menu-title">Complain</div>
            </a>
        </li>
        <p></p>
        <li>
            <a href="/users">
                <div class="parent-icon"><i class="bx bx-group"></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
        </li>
        <p></p>
        <li>
            <a href="/history-orders">
                <div class="parent-icon"><i class="bx bx-history"></i>
                </div>
                <div class="menu-title">History Orders</div>
            </a>
        </li>
        <p></p>
        <li>
            <a href="/drivers">
                <div class="parent-icon"><i class="bx bx-user-check"></i>
                </div>
                <div class="menu-title">Drivers</div>
            </a>
        </li>
        <p></p>
        <li>
            <a href="/history-delivery">
                <div class="parent-icon"><i class="lni lni-delivery"></i>
                </div>
                <div class="menu-title">History Delivery</div>
            </a>
        </li>
        <p></p>
        <li>
            <a href="/transaction">
                <div class="parent-icon"><i class='bx bx-coin-stack'></i>
                </div>
                <div class="menu-title">Transaction</div>
            </a>
        </li>
        <p></p>
        <li>
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-money'></i>
                </div>
                <div class="menu-title">Financial</div>
            </a>
            <ul>
                <li><a href="/user-balance"><i class="bx bx-credit-card-front"></i>User Balance</a></li>
                <li><a href="/driver-balance"><i class="bx bx-credit-card"></i>Driver Balance</a></li>
            </ul>
        </li>
        <p></p>
        <li>
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-star'></i>
                </div>
                <div class="menu-title">Credibility</div>
            </a>
            <ul>
                <li><a href="/user-credibility"><i class="bx bx-group"></i>Users</a></li>
                <li><a href="/driver-credibility"><i class="bx bx-user-check"></i>Drivers</a></li>
            </ul>
        </li>
        <p></p>
        <li>
            <a href="/service">
                <div class="parent-icon"><i class='bx bx-customize'></i>
                </div>
                <div class="menu-title">Service Setting</div>
            </a>
        </li>
        
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown dropdown-large">  
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                            </a>
                            <div class="header-notifications-list">
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                            </a>
                            <div class="header-message-list">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/avatars/icon.png" class="user-img" alt="user avatar">
                     <div class="user-info ps-3">
                            @if (auth()->check())
                            <p class="user-name mb-0">{{ auth()->user()->firstName }}</p>
                            @endif
                            <p class="designattion mb-0"></p>
                        </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/profile"><i class="bx bx-user"></i><span>Profile</span></a></li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <form method="POST" action="/signout">
                        @csrf
                        @method('POST') <!-- Gunakan metode POST -->
                        <button type="submit" class="dropdown-item text-danger">
                            <i class='bx bx-log-out-circle'></i>
                            <span>Logout</span>
                        </button>
                    </form>
                    
                    {{-- <li><a class="dropdown-item text-danger" href="/signout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a></li> --}}
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--end header -->