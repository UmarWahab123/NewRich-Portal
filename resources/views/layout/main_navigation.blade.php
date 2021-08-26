<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('home') }}"><span class="brand-logo">
                          <img src="{{url('/')}}/images/new_logo.png" alt="NewRich" height="28" ></span>
                    <h2 class="brand-text">NewRich</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item dashboard"><a class="d-flex align-items-center" href="{{url('/home')}}"><i data-feather="home"></i><span class="menu-title text-truncate">Dashboard</span></a>
            <li class=" nav-item"><a class="d-flex align-items-center usermgt" href="#"><i data-feather="users"></i><span class="menu-title text-truncate">User Managemnet</span></a>
                <ul class="menu-content">
                    <li class="roles"><a class="d-flex align-items-center" href="{{ url('roles') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">Roles</span></a>
                    </li>
                    <li class="users"><a class="d-flex align-items-center" href="{{ url('users') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">User List</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center enneagram" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate">Enneagram</span></a>
                <ul class="menu-content">
                    <li class="personalities"><a class="d-flex align-items-center" href="{{ url('personalities') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">Personalities</span></a>
                    </li>
                    <li class="mtest"><a class="d-flex align-items-center" href="{{ url('maintest') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">Main Test</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item memberships"><a class="d-flex align-items-center" href="{{url('/memberships')}}"><i data-feather="dollar-sign"></i><span class="menu-title text-truncate">Memberships</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center tariningR" href="#"><i data-feather="folder"></i><span class="menu-title text-truncate">Training Resources</span></a>
                <ul class="menu-content">
                    <li class="classrooms"><a class="d-flex align-items-center" href="{{ url('classrooms') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">Classrooms</span></a>
                    </li>
                    <li class="tutorial"><a class="d-flex align-items-center" href="{{ url('trainings') }}/tutorial"><i data-feather="circle"></i><span class="menu-item text-truncate">Tutorials</span></a>
                    </li>
                    <li class="course"><a class="d-flex align-items-center" href="{{ url('trainings') }}/course"><i data-feather="circle"></i><span class="menu-item text-truncate">Courses</span></a>
                    </li>
                    <li class="video"><a class="d-flex align-items-center" href="{{url('trainings') }}/video"><i data-feather="circle"></i><span class="menu-item text-truncate">Videos</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item settings"><a class="d-flex align-items-center" href="{{url('/settings')}}"><i data-feather='settings'></i><span class="menu-title text-truncate">Settings</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
