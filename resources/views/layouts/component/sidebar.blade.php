<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('template') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">EMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('template') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                <a href="#" class="d-block">{{ auth()->user()->email }}</a>
                <a href="#" class="d-block"><span class="badge badge-success">{{ ucfirst(auth()->user()->getRoleNames()->first()) }}</span></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Route::is('example.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('exampleDataTable.*') ? 'active' : '' }} {{ Route::is('example.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa fa-paperclip"></i>
                        <p>
                            Pre-Events
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href= '/event' class="nav-link {{ Route::is('event') ?  : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Paperworks</p>  
                            </a>
                        </li>
                    </ul>

                   @if (auth()->user()->role == "hepa" ||  auth()->user()->role == "admin")
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href='/statusapproval' class="nav-link {{ Route::is('statusapproval') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Status Approval</p>
                                </a>
                            </li>
                        </ul>
                    @endif 

                   <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href= '/checklist' class="nav-link {{ Route::is('event') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Checklist</p>
                            </a>
                        </li>
                    </ul> --> 
                </li>

                <li class="nav-item {{ Route::is('example.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('exampleDataTable.*') ? 'active' : '' }} {{ Route::is('example.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa fa-paperclip"></i>
                        <p>
                            Events
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href= '/picreport' class="nav-link {{ Route::is('event') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pictorial Report</p>  
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Route::is('example.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('exampleDataTable.*') ? 'active' : '' }} {{ Route::is('example.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa fa-paperclip"></i>
                        <p>
                            Post-Events
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href= '/report' class="nav-link {{ Route::is('event') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Report</p>  
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