<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-light-purple">

    <a href="{{ url('/home') }}" class="brand-link navbar-gray">
        <img src="{{ asset('backend/assets/dist/img/AdminLTELogo.png') }}" alt="{{ env('APP_NAME') }} Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text white font-weight-light"> {{ env('APP_NAME') }} </span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ \App\Facades\ViewHelper::getImagePath('user', auth()->user()->photo ?? 'no-image.png') }}"
                    class="img-circle elevation-2" alt="Gauthali">
            </div>
            <div class="info">
                <a href="{{ route('admin.user.profile') }}" class="d-block">{{ auth()->user()->name ?? 'User' }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ $dashboard_url ?? '#' }}"
                        class="nav-link {{ request()->is('home') || request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">APPLICATION SETTINGS</li>
                @can(['role-create', 'role-index', 'permission-create', 'permission-index', 'user-create', 'user-index',
                    'siteSetting-create', 'siteSetting-index'])
                    <li
                        class="nav-item {{ request()->is('admin/role*') ||
                        request()->is('admin/user*') ||
                        request()->is('admin/permission*') ||
                        request()->is('admin/siteSetting*')
                            ? 'menu-open'
                            : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/role*') ||
                            request()->is('admin/permission*') ||
                            request()->is('admin/user*') ||
                            request()->is('admin/siteSetting*')
                                ? 'active'
                                : '' }}">
                            <i class="nav-icon fas  fa-solid fa-cog"></i>
                            <p>
                                SETTING
                                <i class="fas fa-angle-left right "></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can(['role-create', 'role-index'])
                                <li
                                    class="nav-item {{ request()->is('admin/role') || request()->is('admin/role/*') ? 'menu-open' : '' }}">
                                    <a href="{{ route('admin.role.index') }}"
                                        class="nav-link {{ request()->is('admin/role*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Role
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can(['permission-create', 'permission-index'])
                                <li
                                    class="nav-item {{ request()->is('admin/permission') || request()->is('admin/permission/*') ? 'menu-open' : '' }}">
                                    <a href="{{ route('admin.permission.index') }}"
                                        class="nav-link {{ request()->is('admin/permission*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-lock"></i>
                                        <p>
                                            Permission
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can(['user-create', 'user-index'])
                                <li
                                    class="nav-item {{ request()->is('admin/user') || request()->is('admin/user/*') ? 'menu-open' : '' }}">
                                    <a href="{{ route('admin.user.index') }}"
                                        class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user-cog"></i>
                                        <p>
                                            User
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can(['siteSetting-create', 'siteSetting-index'])
                                <li
                                    class="nav-item {{ request()->is('admin/siteSetting') || request()->is('admin/siteSetting/*') ? 'menu-open' : '' }}">
                                    <a href="{{ route('admin.siteSetting.index') }}"
                                        class="nav-link {{ request()->is('admin/siteSetting*') ? 'active' : '' }}">
                                        <i class="nav-icon fas  fa-solid fa-cog"></i>
                                        <p>
                                            Site Setting
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan


                <li class="nav-header">DEVELOPMENT SETTINGS</li>
                @can(['serviceCategory-create', 'serviceCategory-index', 'memberCategory-create', 'statistics-create',
                    'statistics-index', 'memberCategory-index'])
                    <li
                        class="nav-item {{ request()->is('admin/serviceCategory*') || request()->is('admin/event*') || request()->is('admin/memberCategory*') || request()->is('admin/interestCategory*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/serviceCategory*') || request()->is('admin/event*') || request()->is('admin/memberCategory*') || request()->is('admin/interestCategory*') ? 'active' : '' }}">
                            <i class="nav-icon fas  fa-solid fa-cog"></i>
                            <p>
                                DEVELOPMENT MODE
                                <i class="fas fa-angle-left right "></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can(['serviceCategory-create', 'serviceCategory-index'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.serviceCategory.index') }}"
                                        class="nav-link {{ request()->is('admin/serviceCategory*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-wrench "></i>
                                        <p>
                                            Service Category
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            {{-- @can(['memberCategory-create', 'memberCategory-index'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.memberCategory.index') }}"
                                        class="nav-link {{ request()->is('admin/memberCategory*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Member Category
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can(['interestCategory-create', 'interestCategory-index'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.interestCategory.index') }}"
                                        class="nav-link {{ request()->is('admin/interestCategory*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-hand-holding-usd"></i>
                                        <p>
                                            Interest Category
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            @can(['statistics-create', 'statistics-index'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.statistics.index') }}"
                                        class="nav-link {{ request()->is('admin/statistics*') ? 'active' : '' }}">
                                        <i class="nav-icon fa fa-chart-bar "></i>
                                        <p>
                                            Statistics
                                        </p>
                                    </a>
                                </li>
                            @endcan --}}

                        </ul>
                    </li>

                @endcan
                {{-- @can(['member-create', 'member-index'])
                    <li class="nav-item {{ request()->is('admin/member*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/member*') ? 'active' : '' }}">
                            <i class="nav-icon fas  fa-solid fa-user"></i>
                            <p>
                                Member
                                <i class="fas fa-angle-left right "></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @forelse ($_member_category as $memberCat)
                                @can(['member-create', 'member-index'])
                                    <li class="nav-item">
                                        <a href="{{ route('admin.member-category.index', $memberCat->slug) }}"
                                            class="nav-link {{ request()->is('admin/member-category/' . $memberCat->slug) ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-users"></i>
                                            <p>
                                                {{ $memberCat->title ?? null }}
                                            </p>
                                        </a>
                                        @if (count($memberCat->children) > 0)
                                            <ul class="nav nav-treeview">
                                                @forelse ($memberCat->children as $memberCat)
                                                    @can(['member-create', 'member-index'])
                                                        <li class="nav-item">
                                                            <a href="{{ route('admin.member-category.index', $memberCat->slug) }}"
                                                                class="nav-link {{ request()->is('admin/member-category/' . $memberCat->slug) ? 'active' : '' }}">
                                                                <i class="nav-icon fas fa-users"></i>
                                                                <p>
                                                                    {{ $memberCat->title ?? null }}
                                                                </p>
                                                            </a>

                                                        </li>
                                                    @endcan
                                                @empty
                                                @endforelse
                                            </ul>
                                        @endif
                                    </li>
                                @endcan
                                @empty
                                @endforelse
                            </ul>
                        </li>
                    @endcan
                    @can(['interest-create', 'interest-index'])
                        <li
                            class="nav-item {{ request()->is('admin/interest*') && !request()->is('admin/interestCategory*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/interest*') && !request()->is('admin/interestCategory*') ? 'active' : '' }}">
                                <i class="nav-icon fas  fa-solid fa-percent"></i>
                                <p>
                                    Interest
                                    <i class="fas fa-angle-left right "></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @forelse ($_interest_category as $IntrestCat)
                                    @can(['member-create', 'member-index'])
                                        <li class="nav-item">
                                            <a href="{{ route('admin.interest-category.index', $IntrestCat->slug) }}"
                                                class="nav-link {{ request()->is('admin/interest-category/' . $IntrestCat->slug) ? 'active' : '' }}">
                                                <i class="nav-icon fas fa-circle"></i>
                                                <p>
                                                    {{ $IntrestCat->title ?? null }}
                                                </p>
                                            </a>

                                        </li>
                                    @endcan
                                @empty
                                @endforelse
                            </ul>
                        </li>
                    @endcan --}}
                {{-- @can(['eventForm-create', 'eventForm-index'])
                        <li class="nav-item">
                            <a href="{{ route('admin.eventForm.index') }}"
                                class="nav-link {{ request()->is('admin/eventForm*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-server"></i>
                                <p>
                                    Event Form
                                </p>
                            </a>
                        </li>
                    @endcan --}}

                <li class="nav-header">WEB MODE</li>

                @can(['service-create', 'service-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.service.index') }}"
                            class="nav-link {{ request()->is('admin/service*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-server"></i>
                            <p>
                                Service
                            </p>
                        </a>
                    </li>
                @endcan

                {{-- @can(['member-create', 'member-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.member.index') }}"
                            class="nav-link {{ request()->is('admin/member*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Member
                            </p>
                        </a>
                    </li>
                @endcan --}}

                @can(['aboutUs-create', 'aboutUs-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.aboutUs.index') }}"
                            class="nav-link {{ request()->is('admin/aboutUs*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-info-circle"></i>
                            <p>
                                About Us
                            </p>
                        </a>
                    </li>
                @endcan

                @can(['slider-create', 'slider-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.slider.index') }}"
                            class="nav-link {{ request()->is('admin/slider*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                Slider Management
                            </p>
                        </a>
                    </li>
                @endcan

                @can(['blog-create', 'blog-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.blog.index') }}"
                            class="nav-link {{ request()->is('admin/blog*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Blogs
                            </p>
                        </a>
                    </li>
                @endcan

                @can(['partner-create', 'partner-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.partner.index') }}"
                            class="nav-link {{ request()->is('admin/partner*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-people-carry"></i>
                            <p>
                                Partners
                            </p>
                        </a>
                    </li>
                @endcan
                @can(['testimonial-create', 'testimonial-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.testimonial.index') }}"
                            class="nav-link {{ request()->is('admin/testimonial*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Testimonial/Message
                            </p>
                        </a>
                    </li>
                @endcan

                @can(['gallery-create', 'gallery-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.gallery.index') }}"
                            class="nav-link {{ request()->is('admin/gallery*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-images"></i>
                            <p>
                                Gallery
                            </p>
                        </a>
                    </li>
                @endcan

                @can(['file-create', 'file-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.file.index') }}"
                            class="nav-link {{ request()->is('admin/file*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                File Management
                            </p>
                        </a>
                    </li>
                @endcan

                @can(['notice-create', 'notice-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.notice.index') }}"
                            class="nav-link {{ request()->is('admin/notice*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-bell"></i>
                            <p>
                                Notice Management
                            </p>
                        </a>
                    </li>
                @endcan
                @can(['career-create', 'career-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.career.index') }}"
                            class="nav-link {{ request()->is('admin/career*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Career
                            </p>
                        </a>
                    </li>
                @endcan
                @can(['faq-create', 'faq-index'])
                    <li class="nav-item">
                        <a href="{{ route('admin.faq.index') }}"
                            class="nav-link {{ request()->is('admin/faq*') ? 'active' : '' }}">
                            <i class="nav-icon  fas  fa-question"></i>

                            <p>
                                FaQ
                            </p>
                        </a>
                    </li>
                @endcan



                <li class="nav-item nav-header"></li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"
                        class="nav-link">
                        <i class="nav-icon fas fa-backspace"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
{{--                                ACL --}}
