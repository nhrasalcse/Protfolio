
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{!empty(Auth::user()->image) ? asset('image/user-pic/'.Auth::user()->image) :asset('image/user-pic/user.jpg')}}" class="img-circle" alt="e">
                </div>
                <div class="pull-left info">
                    <p>{{!empty(Auth::user()->name) ? Auth::user()->name:''}}</p>
                    <a href="#"><i class="fa fa-user-circle text-success"></i>Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="">
                    <a href="{!! url('/dashboard') !!}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Multilevel</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Level One
                                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li>
{{--                Customer menu--}}
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Customer</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('customer.index')}}"><i class="fa fa-circle-o"></i> All Customer</a></li>
                        <li><a href="{{route('customer.create')}}"><i class="fa fa-circle-o"></i> Add Customer</a></li>
                    </ul>
                </li>
{{--                Employee--}}
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Employee</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('employee.index')}}"><i class="fa fa-circle-o"></i> All Employee</a></li>
                        <li><a href="{{route('employee.create')}}"><i class="fa fa-circle-o"></i> Add Employee</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                        <span>Message</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('message.index')}}"><i class="fa fa-circle-o"></i> Inbox</a></li>
                        <li><a href="{{route('message.create')}}"><i class="fa fa-circle-o"></i> Compose</a></li>
                    </ul>
                </li>

                {{--user management --}}
                @if((Auth::user()->role_id==1))
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>User Management</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i> All User</a></li>
                        <li><a href="{{route('user.create')}}"><i class="fa fa-circle-o"></i> Add User</a></li>
                    </ul>
                </li>
            @endif
               </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
