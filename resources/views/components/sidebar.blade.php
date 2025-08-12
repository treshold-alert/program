<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-semibold ms-2">Goods Warehouse</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            @auth
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
            @else
                <a href="{{ route('login') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
            @endauth
        </li>

        <!-- Products -->
        <li class="menu-item {{ request()->routeIs('products.view') ? 'active' : '' }}">
            <a href="{{ route('products.view') }}" class="menu-link ">
                <i class="menu-icon tf-icons mdi mdi-cube-outline"></i>
                <div data-i18n="Layouts">Products</div>
            </a>
        </li>

        <!-- Back to Page -->
        <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link ">
                <i class="menu-icon tf-icons mdi mdi-flip-to-front"></i>
                <div data-i18n="Layouts">Home</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('transactions.view') ? 'active' : '' }}">
            @auth
                <a href="{{ route('transactions.view') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-credit-card-outline"></i>
                    <div data-i18n="Front Pages">Transactions</div>
                </a>
            @else
                <a href="{{ route('login') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-credit-card-outline"></i>
                    <div data-i18n="Front Pages">Transactions</div>
                </a>
            @endauth
        </li>

        <li class="menu-item {{ request()->routeIs('average.view') ? 'active' : '' }}">
            @auth
                <a href="{{ route('average.view') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-chart-line"></i>
                    <div data-i18n="Front Pages">Moving Average</div>
                </a>
            @else
                <a href="{{ route('login') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-chart-line"></i>
                    <div data-i18n="Front Pages">Moving Average</div>
                </a>
            @endauth
        </li>

        <li class="menu-item {{ request()->routeIs('log.view') ? 'active' : '' }}">
            @auth
                <a href="{{ route('log.view') }}" class="menu-link ">
                    <i class="menu-icon tf-icons mdi mdi-folder-outline"></i>
                    <div data-i18n="Layouts">Logs</div>
                </a>
            @else
                <a href="{{ route('login') }}" class="menu-link ">
                    <i class="menu-icon tf-icons mdi mdi-folder-outline"></i>
                    <div data-i18n="Layouts">Logs</div>
                </a>
            @endauth
        </li>

        @auth
            <li class="menu-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="menu-link border-transparent bg-transparent">
                        <!-- Unique Logout Icon -->
                        <i class="menu-icon tf-icons mdi mdi-logout"></i>
                        <div data-i18n="Front Pages">Logout</div>
                    </button>
                </form>

            </li>
        @endauth
    </ul>

</aside>
