<div class="vertical-menu">

    <div data-simplebar="" class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">03</span>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('banners') }}" class="waves-effect">
                        <i class="bx bx-layout"></i>
                        <span class='text-capitalize'>{{ __('banners') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('categories') }}" class="waves-effect">
                        <i class="bx bx-layout"></i>
                        <span class='text-capitalize'>{{ __('categories') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('brands') }}" class="waves-effect">
                        <i class="bx bx-layout"></i>
                        <span class='text-capitalize'>{{ __('brands') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('attributes') }}" class="waves-effect">
                        <i class="bx bx-layout"></i>
                        <span class='text-capitalize'>{{ __('attributes') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('products') }}" class="waves-effect">
                        <i class="bx bx-layout"></i>
                        <span class="badge badge-pill badge-danger float-right">
                            10
                        </span>
                        <span class='text-capitalize'>{{ __('products') }}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-layout"></i>
                        <span class="badge badge-pill badge-info float-right">
                            03
                        </span>
                        <span class='text-capitalize'>{{ __('vouchers') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a class='text-capitalize' href="{{ url('/') }}">{{ 'Add' }}</a></li>
                        <li><a class='text-capitalize' href="{{ url('/') }}">{{ 'List' }}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('orders') }}" class="waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span class="badge badge-pill badge-success float-right">
                            New
                        </span>
                        <span class='text-capitalize'>{{ __('orders') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('users') }}" class="waves-effect">
                        <i class="bx bx-layout"></i>
                        <span class='text-capitalize'>{{ __('users') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('blogs') }}" class="waves-effect">
                        <i class="bx bx-layout"></i>
                        <span class='text-capitalize'>{{ __('blogs') }}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog"></i>
                        <span class='text-capitalize'>{{ __('settings') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a class='text-capitalize' href="{{ route('setting', 'general') }}">
                                {{ __('general') }}</a></li>
                        <li><a class='text-capitalize' href="{{ route('setting', 'logo') }}">
                                {{ __('logo') }}</a></li>
                        <li><a class='text-capitalize' href="{{ route('setting', 'footer-seo') }}">
                                {{ __('footer & seo') }}</a></li>
                        <li><a class='text-capitalize' href="{{ route('setting', 'social-link') }}">
                                {{ __('social links') }}</a></li>
                        <li><a class='text-capitalize' href="{{ route('setting', 'analytic') }}">
                                {{ __('analytics') }}</a></li>
                        <li><a class='text-capitalize' href="{{ route('setting', 'payment') }}">
                                {{ __('payments') }}</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>