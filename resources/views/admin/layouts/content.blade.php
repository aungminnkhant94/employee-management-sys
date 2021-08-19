<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row ">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4 ">
                    <div class="card-body">
                        <p>
                            <i class="fas fa-user fa-fw"style="font-size:70px"></i>
                        </p>Users   
                    </div>
                    
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"style="font-size:30px;" href="#">{{ App\Models\User::all()->count() }}</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <p>
                            <i class="fas fa-building fa-fw"style="font-size:70px"></i>
                        </p>Departments 
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"style="font-size:30px;" href="#">
                            {{ App\Models\Department::all()->count() }}
                        </a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <p>
                            <i class="fas fa-book-open fa-fw"style="font-size:70px"></i>
                        </p>Roles 
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"style="font-size:30px;" href="#">
                            {{ App\Models\Role::all()->count() }}
                        </a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!--<div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Danger Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- 
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar mr-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <div class="table-responsive">

                </div>
            </div>
        </div>
        -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Your Details
                    </div>
                    <div class="card-header"style="background-color:navy-blue">
                        Name : <span class="bold">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="card-header"style="background-color:navy-blue">
                        Email : <span class="bold">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="card-header"style="background-color:navy-blue">
                        Address : <span class="bold">{{ Auth::user()->address }}</span>
                    </div>
                    <div class="card-header"style="background-color:navy-blue">
                        Mobile : <span class="bold">{{ Auth::user()->mobile_number }}</span>
                    </div>
                    <div class="card-header"style="background-color:navy-blue">
                        Department : <span class="bold">{{ Auth::user()->department->name }}</span>
                    </div>
                    <div class="card-header"style="background-color:navy-blue">
                        Role : <span class="bold">{{ Auth::user()->role->name }}</span>
                    </div>
                    <div class="card-header"style="background-color:navy-blue">
                        Position : <span class="bold">{{ Auth::user()->position }}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2020</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>