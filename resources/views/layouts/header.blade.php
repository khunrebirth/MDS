<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        {{--<div class="search-element">--}}
            {{--<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">--}}
            {{--<button class="btn" type="submit"><i class="fas fa-search"></i></button>--}}
            {{--<div class="search-backdrop"></div>--}}
            {{--<div class="search-result">--}}
                {{--<div class="search-header">--}}
                    {{--Histories--}}
                {{--</div>--}}
                {{--<div class="search-item">--}}
                    {{--<a href="#">How to hack NASA using CSS</a>--}}
                    {{--<a href="#" class="search-close"><i class="fas fa-times"></i></a>--}}
                {{--</div>--}}
                {{--<div class="search-item">--}}
                    {{--<a href="#">Kodinger.com</a>--}}
                    {{--<a href="#" class="search-close"><i class="fas fa-times"></i></a>--}}
                {{--</div>--}}
                {{--<div class="search-item">--}}
                    {{--<a href="#">#Stisla</a>--}}
                    {{--<a href="#" class="search-close"><i class="fas fa-times"></i></a>--}}
                {{--</div>--}}
                {{--<div class="search-header">--}}
                    {{--Result--}}
                {{--</div>--}}
                {{--<div class="search-item">--}}
                    {{--<a href="#">--}}
                        {{--<img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png"--}}
                             {{--alt="product">--}}
                        {{--oPhone S9 Limited Edition--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="search-item">--}}
                    {{--<a href="#">--}}
                        {{--<img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png"--}}
                             {{--alt="product">--}}
                        {{--Drone X2 New Gen-7--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="search-item">--}}
                    {{--<a href="#">--}}
                        {{--<img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png"--}}
                             {{--alt="product">--}}
                        {{--Headphone Blitz--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="search-header">--}}
                    {{--Projects--}}
                {{--</div>--}}
                {{--<div class="search-item">--}}
                    {{--<a href="#">--}}
                        {{--<div class="search-icon bg-danger text-white mr-3">--}}
                            {{--<i class="fas fa-code"></i>--}}
                        {{--</div>--}}
                        {{--Stisla Admin Template--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="search-item">--}}
                    {{--<a href="#">--}}
                        {{--<div class="search-icon bg-primary text-white mr-3">--}}
                            {{--<i class="fas fa-laptop"></i>--}}
                        {{--</div>--}}
                        {{--Create a new Homepage Design--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
{{--                <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">--}}
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">ระบบจัดการหอพัก</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">MDS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">เมนูการจัดการ</li>
            <li class="{{ Route::is('rooms.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('rooms.index') }}"><i class="fas fa-briefcase"></i> <span>ห้องพัก</span></a></li>
            <li class="{{ Route::is('customers.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('customers.index') }}"><i class="fas fa-users"></i> <span>ลูกค้า</span></a></li>
            <li class="nav-item dropdown {{ Route::is('meters.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-alt"></i><span>บันทึก</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('meters.water.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('meters.water.home') }}">มิเตอร์น้ำ</a></li>
                    <li class="{{ Route::is('meters.electric.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('meters.electric.home') }}">มิเตอร์ไฟ</a></li>
                </ul>
            </li>
            <li class="{{ Route::is('invoices.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('invoices.index') }}"><i class="fas fa-newspaper"></i> <span>สร้างใบแจ้งค่าเช่า</span></a>
            </li>
            <li class="{{ Route::is('payments.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('payments.index') }}"><i class="fas fa-dollar-sign"></i> <span>ชำระค่าเช่า</span></a></li>
            <li class="{{ Route::is('settings.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('settings.index') }}"><i class="fas fa-cogs"></i> <span>ตั้งค่า</span></a></li>
        </ul>
    </aside>
</div>
