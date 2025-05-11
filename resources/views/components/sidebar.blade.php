<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
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
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <!-- Products -->
        <li class="menu-item {{ request()->routeIs('products.view') ? 'active' : '' }}">
            <a href="{{ route('products.view') }}" class="menu-link ">
                <i class="menu-icon tf-icons mdi mdi-cube-outline"></i>
                <div data-i18n="Layouts">Products</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('transactions.view') ? 'active' : '' }}">
            <a href="{{ route('transactions.view') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-credit-card-outline"></i>
                <div data-i18n="Front Pages">Transactions</div>
            </a>
        </li>
        
        <li class="menu-item {{ request()->routeIs('log.view') ? 'active' : '' }}">
            <a href="{{ route('log.view') }}" class="menu-link ">
                <i class="menu-icon tf-icons mdi mdi-folder-outline"></i>
                <div data-i18n="Layouts">Logs</div>
            </a>
        </li>


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
    </ul>

</aside>
