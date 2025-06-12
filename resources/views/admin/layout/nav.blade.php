<nav class="main-header navbar navbar-expand navbar-dark navbar-gray">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('home')}}" class="nav-link">Home</a>
        </li>
{{--        <li class="nav-item dropdown">--}}
{{--            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>--}}
{{--            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">--}}
{{--                <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                <li class="dropdown-divider"></li>--}}
{{--                <li class="dropdown-submenu dropdown-hover">--}}
{{--                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">--}}
{{--                        <li>--}}
{{--                            <a tabindex="-1" href="#" class="dropdown-item">level 2</a>--}}
{{--                        </li>--}}

{{--                        <li class="dropdown-submenu">--}}
{{--                            <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>--}}
{{--                            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">--}}
{{--                                <li><a href="#" class="dropdown-item">3rd level</a></li>--}}
{{--                                <li><a href="#" class="dropdown-item">3rd level</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}

{{--                        <li><a href="#" class="dropdown-item">level 2</a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">level 2</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>

    </ul>
</nav>
