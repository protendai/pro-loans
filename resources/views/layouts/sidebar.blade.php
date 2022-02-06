<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">VIRTOUS FINANCE</span>
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

            <li class="sidebar-item  {{ request()->routeIs('purchases.index') ? 'active' : null }}">
                <a href="#purchasing" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Loans</span>
                </a>
                <ul id="purchasing" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/loans">View Loans</a>
                    </li>
     
                </ul>
            </li>
        
            <li class="sidebar-item {{ request()->routeIs('profile.index') ? 'active' : null }}">
                <a class="sidebar-link" href="/profile">
                    <i class="align-middle" data-feather="user"></i> <span
                        class="align-middle">Profile</span>
                </a>
            </li>


            <li class="sidebar-item  {{ request()->routeIs('users.customers') ? 'active' : null }}">
                <a class="sidebar-link" href="/customers">
                    <i class="align-middle" data-feather="users"></i> <span
                        class="align-middle">Customers</span>
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