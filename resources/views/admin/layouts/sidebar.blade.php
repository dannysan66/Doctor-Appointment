<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{ url('dashboard') }}">
                <div class="logo-img">
                   <img src="banner/Health.png" class="brand-img" width="150px" height="40px">
                </div>
            </a>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item active">
                        <a href="{{ url('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>
                    {{-- <div class="nav-item">
                        <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                    </div> --}}

                    @if(auth()->check()&& auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Departments</span>
                            <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{ route('department.create') }}" class="menu-item">Create</a>
                            <a href="{{ route('department.index') }}" class="menu-item">View</a>
                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&& auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Users</span>
                            <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{ route('doctor.create') }}" class="menu-item">Create Doctors</a>
                            <a href="{{ route('doctor.index') }}" class="menu-item">View All Users</a>
                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&& auth()->user()->role->name === 'doctor')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Appointments</span>
                            <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{ route('appointment.create') }}" class="menu-item">Create</a>
                            <a href="{{ route('appointment.index') }}" class="menu-item">Check</a>
                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&& auth()->user()->role->name === 'doctor')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patients</span>
                            <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{ route('patients.today') }}" class="menu-item">Patients (today)</a>
                            <a href="{{ route('prescribed.patients') }}" class="menu-item">All Patients (Prescription)</a>
                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&& auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patient's Appointments</span>
                            <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{ route('patient') }}" class="menu-item">Today's Appointments</a>
                            <a href="{{ route('all.appointments') }}" class="menu-item">All Appointments</a>
                        </div>
                    </div>
                    @endif

                    <div class="nav-lavel">Support</div>
                    <div class="nav-item">
                        <a href="javascript:void(0)"><i class="ik ik-monitor"></i><span>Documentation</span></a>
                    </div>
                    <div class="nav-item">
                        <a href="javascript:void(0)"><i class="ik ik-help-circle"></i><span>Submit Issue</span></a>
                    </div>


                    <div class="nav-lavel">Logout</div>
                    <div class="nav-item active">
                        <a  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                        <i class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
