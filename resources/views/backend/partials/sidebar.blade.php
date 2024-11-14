<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    @php
        $system = \App\Models\SystemSetting::first();
        $logo = $system ? $system->logo : null;
        $privacy = App\Models\PrivacyPolicy::first();
        $terms = App\Models\PrivacyPolicy::offset(1)->first();
    @endphp

    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <img src="{{ asset($logo) }}" alt="" class="img-fluid">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('dashboard') }}">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- ..................................................... --}}

        <!-- Category -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Category</span></li>
        <!--Category Layouts start-->
        <li class="menu-item">
            {{-- <li class="menu-item {{ Request::routeIs('admin.category.*') ? 'active' : '' }}"> --}}
            <a href="" class="menu-link">
                {{-- <a href="{{ route('admin.category.index') }}" class="menu-link"> --}}
                <i class='menu-icon tf-icons bx bx-trip'></i>
                <div data-i18n="Layouts">Category</div>
            </a>
        </li>
        <!--Category Layouts end-->


        {{-- holidays --}}
        <li class="menu-item">
            <a href="" class="menu-link ">
                <i class='menu-icon tf-icons bx bx-sun'></i>
                <div data-i18n="Layouts">Holidays</div>
            </a>
        </li>
        {{-- Hotel --}}
        <li class="menu-item">
            <a href="" class="menu-link ">
                <i class='menu-icon tf-icons bx bx-hotel'></i>
                <div data-i18n="Layouts">Hotels</div>
            </a>
        </li>
        {{-- offers --}}
        {{--  <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-discount'></i>
                <div data-i18n="Layouts">Offers</div>
            </a>
        </li> --}}
        {{-- ..................................................... --}}

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Booking</span></li>
        <!-- CMS -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">Booking</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link" href="">All Booking</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="">All Payment</a>
                </li>
            </ul>
        </li>



        {{-- ..................................................... --}}

        <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>
        <!-- CMS -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">CMS</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link" href="">Contact Section</a>
                </li>
            </ul>
        </li>


        {{-- ..................................................... --}}

        <!-- Blogs -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Blogs</span></li>
        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxl-blogger"></i>
                <div data-i18n="Layouts">Blog</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item"><a class="menu-link" href=""> Categories</a></li>
                <li class="menu-item"><a class="menu-link" href=""> Tags</a></li>
                <li class="menu-item"><a class="menu-link" href="">Blogs</a></li>
            </ul>
        </li>

        <!-- Service -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Service</span></li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-badge-check'></i>
                <div data-i18n="Layouts">Service</div>
            </a>
        </li>

        <!-- Contact -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Contact Us</span></li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-message-dots"></i>
                <div data-i18n="Layouts">Messages</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-news"></i>
                <div data-i18n="Layouts">Newsletters</div>
            </a>
        </li>



        <!-- FAQ-->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">FAQ</span></li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-badge-check'></i>
                <div data-i18n="Layouts">FAQ</div>
            </a>
        </li>

        <!-- User-->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">User</span></li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user'></i>
                <div data-i18n="Layouts">User</div>
            </a>
        </li>

        {{-- ..................................................... --}}



        <!-- Settings -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Settings</span></li>
        <!-- Layouts -->
        <li
            class="menu-item {{ Request::routeIs('admin.system.setting') || Request::routeIs('system.mail.index') || Request::routeIs('social.media') || Request::routeIs('stripe.index') || Request::routeIs('privacy.edit') || Request::routeIs('terms.edit') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">Settings</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('admin.system.setting') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('admin.system.setting') }}">System Settings</a>
                </li>

                <li class="menu-item {{ Request::routeIs('social.media') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('social.media') }}">Social Media</a>
                </li>

                <li class="menu-item {{ Request::routeIs('system.mail.index') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('system.mail.index') }}">Mail Setting</a>
                </li>

                <li class="menu-item {{ Request::routeIs('stripe.index') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('stripe.index') }}">Stripe</a>
                </li>

                <li class="menu-item {{ Request::routeIs('privacy.edit') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('privacy.edit', ['slug' => $privacy->slug]) }}">Privacy &
                        Policy </a>
                </li>

                <li class="menu-item {{ Request::routeIs('terms.edit') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('terms.edit', ['slug' => $terms->slug]) }}">Terms &
                        Conditions</a>
                </li>

            </ul>
            {{-- <li class="menu-item"><a class="menu-link" href="">Paypal</a></li> --}}
        </li>

        {{-- ..................................................... --}}

        {{-- prifile seatting start --}}
        <li class="menu-item {{ Request::routeIs('profilesetting') }}">
            <a class="menu-link" href="{{ route('profilesetting') }}">
                <i class="menu-icon tf-icons bx bxs-user-account"></i>
                <div data-i18n="Support">Profile Setting</div>
            </a>
        </li>
        {{-- prifile seatting end --}}

    </ul>
</aside>
