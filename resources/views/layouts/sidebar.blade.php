<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('assets/index3.html')}}" class="brand-link">
        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">PRANTIK SOFT</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        {{--<ul class="navbar-nav ml-auto ">
            <li class="nav-item dropdown">
                <div class="nav-link user-panel mt-3 pb-3 mb-3 d-flex row" data-toggle="dropdown" href="#">
                    <div class="image col-3">
                        <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="col-9 text-white">
        <a href="#" class="">Alexander Pierce</a>
        <i class="fas fa-angle-down right"></i>
    </div>
    </div>
    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right bg-primary ">
        <a href="{{ route('user.edit', auth()->user()->id)}}" class="dropdown-item btn text-primary text-center"><i class="fas fa-solid fa-user "></i> Profile </a>

        <div class="dropdown-divider"></div>

        <a href="{{ route('logout') }}" class="dropdown-item btn text-primary text-center" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    </li>
    </ul>--}}

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item {{ Route::is('user.index') || Route::is('user.create') || Route::is('user.edit')  ? 'menu-open' : null }} ">
                <a href="#" class="nav-link {{ Route::is('user.index') || Route::is('user.create') || Route::is('user.edit')  ? 'active' : null }}">
                    <!-- <i class="nav-icon fas fa-solid fa-user"></i> -->
                    <i class="nav-icon fas fa-users mr-2"></i>
                    <p>
                        Users
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('user.create')}}" class="nav-link {{ Route::is('user.create') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link {{ Route::is('user.index') || Route::is('user.edit') ? 'active' : null }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Route::is('employee.index') || Route::is('employee.create') || Route::is('employee.edit')  ? 'menu-open' : null }} ">
                <a href="#" class="nav-link {{ Route::is('employee.index') || Route::is('employee.create') || Route::is('employee.edit')  ? 'active' : null }}">
                    <i class="nav-icon fas fa-users mr-2"></i>
                    <p>
                        Employe
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('employee.create')}}" class="nav-link {{ Route::is('employee.create') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('employee.index')}}" class="nav-link {{ Route::is('employee.index') || Route::is('employee.edit') ? 'active' : null }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Employe List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Route::is('wash.income') || Route::is('product.income') || Route::is('product.summery') || Route::is('product.dateWise') || Route::is('wash.summery') || Route::is('wash.dateWise') || Route::is('expense.summery') || Route::is('expense.dateWise') ? 'menu-open' : null }} ">
                <a href="#" class="nav-link {{ Route::is('wash.income') || Route::is('product.income') || Route::is('product.dateWise') || Route::is('wash.summery') || Route::is('wash.dateWise')|| Route::is('expense.summery') || Route::is('expense.dateWise') ? 'active' : null }}">
                    <i class="nav-icon fas fa-solid fa-wallet"></i>
                    <p>
                        Report
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('wash.income')}}" class="nav-link {{ Route::is('wash.income') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Car Wash All</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('wash.summery')}}" class="nav-link {{ Route::is('wash.summery') || Route::is('wash.dateWise') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Car Wash Summery</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product.income')}}" class="nav-link {{  Route::is('product.income') ? 'active' : null }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product Sale All</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('product.summery')}}" class="nav-link {{  Route::is('product.summery') || Route::is('product.dateWise') ? 'active' : null }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product Sale Summery</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('expense.summery')}}" class="nav-link {{  Route::is('expense.summery') || Route::is('expense.dateWise') ? 'active' : null }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Total Expense</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Route::is('product.index') || Route::is('product.create') || Route::is('product.edit')  ? 'menu-open' : null }} ">
                <a href="#" class="nav-link {{ Route::is('product.index') || Route::is('product.create') || Route::is('product.edit') ? 'active' : null }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Product
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('product.create')}}" class="nav-link {{ Route::is('product.create') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product.index')}}" class="nav-link {{ Route::is('product.index') || Route::is('product.edit')  ? 'active' : null }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Route::is('sale.index') || Route::is('sale.create') || Route::is('sale.edit') || Route::is('sale.show') ? ' menu-open' : null }}">
                <a href="#" class="nav-link {{ Route::is('sale.index') || Route::is('sale.create') || Route::is('sale.edit') || Route::is('sale.show') ? 'active' : null }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Invoice
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('sale.create')}}" class="nav-link {{ Route::is('sale.create') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('sale.index')}}" class="nav-link {{ Route::is('sale.index') || Route::is('sale.edit') || Route::is('sale.show') ? 'active' : null }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Route::is('saleproduct.index') || Route::is('saleproduct.create') || Route::is('saleproduct.edit') ? 'menu-open' : null }} ">
                <a href="#" class="nav-link {{ Route::is('saleproduct.index') || Route::is('saleproduct.create') || Route::is('saleproduct.edit') ? 'active' : null }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Sold Product
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('saleproduct.index')}}" class="nav-link {{ Route::is('saleproduct.index') || Route::is('saleproduct.edit') ? 'active' : null }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Route::is('service.index') || Route::is('service.create') || Route::is('service.edit') ? 'menu-open' : null }} ">
                <a href="#" class="nav-link {{ Route::is('service.index') || Route::is('service.create') || Route::is('service.edit') ? 'active' : null }}">
                    <!-- <i class="nav-icon fas fa-book"></i> -->
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Service
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('service.create')}}" class="nav-link {{ Route::is('service.create') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('service.index')}}" class="nav-link {{ Route::is('service.index')  || Route::is('service.edit') ? 'active' : null }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Route::is('vehicle.index') || Route::is('vehicle.create')  || Route::is('vehicle.edit') ? 'menu-open' : null }} ">
                <a href="#" class="nav-link {{ Route::is('vehicle.index') || Route::is('vehicle.create')  || Route::is('vehicle.edit') ? 'active' : null }}">
                    <!-- <i class="nav-icon fas fa-book"></i> -->
                    <i class="nav-icon fas fa-solid fa-car"></i>
                    <p>
                        Vehicle
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('vehicle.create')}}" class="nav-link {{ Route::is('vehicle.create') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('vehicle.index')}}" class="nav-link {{ Route::is('vehicle.index') || Route::is('vehicle.edit') ? 'active' : null }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Route::is('expense.index') || Route::is('expense.create')  || Route::is('expense.edit') ? 'menu-open' : null }} ">
                <a href="#" class="nav-link {{ Route::is('expense.index') || Route::is('expense.create')  || Route::is('expense.edit') ? 'active' : null }}">
                    <i class="nav-icon fas fa-book"></i>
                    <!-- <i class="nav-icon fas fa-solid fa-car"></i> -->
                    <p>
                        Expense
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('expense.create')}}" class="nav-link {{ Route::is('expense.create') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('expense.index')}}" class="nav-link {{ Route::is('expense.index') || Route::is('expense.edit') ? 'active' : null }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>