<div id="layoutSidenav">
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Departments
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                    @if(isset(auth()->user()->role->permission['name']['department']["can-add"]))
                        <a class="nav-link" href="{{ route('departments.create') }}">Create Department</a>
                    @endif
                    @if(isset(auth()->user()->role->permission['name']['department']["can-view"]))
                        <a class="nav-link" href="{{ route('departments.index') }}">View Department</a>
                    @endif 
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Roles
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                    @if(isset(auth()->user()->role->permission['name']['role']["can-add"]))
                        <a class="nav-link" href="{{ route('roles.create') }}">Create Role</a>
                    @endif
                    @if(isset(auth()->user()->role->permission['name']['role']["can-view"]))
                        <a class="nav-link" href="{{ route('roles.index') }}">View Role</a>
                    @endif
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                    @if(isset(auth()->user()->role->permission['name']['user']["can-add"]))
                        <a class="nav-link" href="{{ route('users.create') }}">Create User</a>
                    @endif
                    @if(isset(auth()->user()->role->permission['name']['user']["can-view"]))
                        <a class="nav-link" href="{{ route('users.index') }}">View User</a>
                    @endif
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermission" aria-expanded="false" aria-controls="collapsePermission">
                    <div class="sb-nav-link-icon"><i class="fas fa-pencil-ruler"></i></div>
                    Permissions
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePermission" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                    @if(isset(auth()->user()->role->permission['name']['permission']["can-add"]))
                        <a class="nav-link" href="{{ route('permissions.create') }}">Create Permission</a>
                    @endif
                    @if(isset(auth()->user()->role->permission['name']['permission']["can-view"]))
                        <a class="nav-link" href="{{ route('permissions.index') }}">View Permission</a>
                    @endif
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>