<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">ZIMPAPERS | COMEX</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Modules
            </li>

            <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : null }}">
                <a class="sidebar-link" href="{{route("dashboard")}}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>

            @if(Auth::user()->role !="SEC")

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/products">
                        <i class="align-middle" data-feather="grid"></i> <span
                            class="align-middle">Products</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/suppliers">
                        <i class="align-middle" data-feather="truck"></i> <span
                            class="align-middle">Suppliers</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->role !="ST")
            <li class="sidebar-item  {{ request()->routeIs('purchases.index') ? 'active' : null }}">
                <a href="#purchasing" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Purchasing Requests</span>
                </a>
                <ul id="purchasing" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    @if(Auth::user()->role !="HOD")
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/purchases/request/create">Create Request</a>
                    </li>
                    @endif
                    @if(Auth::user()->role !="SEC")
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/purchases">View Requests</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            <li class="sidebar-item  {{ request()->routeIs('inventory.create') ? 'active' : null }}">
                <a href="#inventory" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Inventory Requests</span>
                </a>
                <ul id="inventory" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    @if(Auth::user()->role =='SEC')
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/inventory">Create Request</a>
                        </li>
                    @else
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/inventory/requests/view">View Requests</a>
                    </li>
                    @endif
                  
                </ul>
            </li>

            <li class="sidebar-item {{ request()->routeIs('profile.index') ? 'active' : null }}">
                <a class="sidebar-link" href="/profile">
                    <i class="align-middle" data-feather="user"></i> <span
                        class="align-middle">Profile</span>
                </a>
            </li>

            @if(Auth::user()->role =="AD")
            <li class="sidebar-item  {{ request()->routeIs('users.index') ? 'active' : null }}">
                <a class="sidebar-link" href="/users">
                    <i class="align-middle" data-feather="users"></i> <span
                        class="align-middle">Users</span>
                </a>
            </li>
           
    
            <li class="sidebar-item">
                <a href="#settings" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                </a>
                <ul id="settings" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/settings/params">Parameters</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/settings/audit">Audit Trail</a>
                    </li>
                </ul>
            </li>
            @endif
            
        </ul>  
    </div>
</nav>