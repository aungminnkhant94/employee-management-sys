<div id="layoutSidenav">
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="/">
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
                    <!--@if(isset(auth()->user()->role->permission['name']['user']["can-add"]))-->
                        <a class="nav-link" href="{{ route('users.create') }}">Create User</a>
                    <!--@endif -->
                    <!--comment-->
                    <!--@if(isset(auth()->user()->role->permission['name']['user']["can-view"])) -->
                        <a class="nav-link" href="{{ route('users.index') }}">View User</a>
                    <!--@endif-->
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

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave" aria-expanded="false" aria-controls="collapseLeave">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Leaves
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLeave" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                    @if(isset(auth()->user()->role->permission['name']['leave']["can-add"]))
                        <a class="nav-link" href="{{ route('leaves.create') }}">Create Leave</a>
                    @endif
                    @if(isset(auth()->user()->role->permission['name']['leave']["can-view"]))
                        <a class="nav-link" href="{{ route('leaves.index') }}">View Leave</a>
                    @endif
                    @if(isset(auth()->user()->role->permission['name']['leave']["can-control"]))
                        <a class="nav-link" href="{{ url('leaves/show') }}">Review Leaves</a>
                    @endif
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNotice" aria-expanded="false" aria-controls="collapseNotice">
                    <div class="sb-nav-link-icon"><i class="fas fa-flag-checkered"></i></div>
                    Notices
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseNotice" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                    @if(isset(auth()->user()->role->permission['name']['notice']["can-add"]))
                        <a class="nav-link" href="{{ route('notices.create') }}">Create notice</a>
                    @endif
                    @if(isset(auth()->user()->role->permission['name']['notice']["can-view"]))
                        <a class="nav-link" href="{{ route('notices.index') }}">View notice</a>
                    @endif
                    </nav>
                </div>
                <!--
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
                -->
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>