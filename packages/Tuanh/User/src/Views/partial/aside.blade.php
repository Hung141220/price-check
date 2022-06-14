<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="@yield('menu', '')" href="{{ route('menu.list') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @foreach (Tuanh\User\Model\Menu::where('parent_id',0)->get() as $item)
                    <li class="sub-menu">
                        <a class="{{ (Route::getFacadeRoot()->current()->action['as'] == $item->src) ? 'active' : '' }}" href="{{ route($item->src) }}">
                            <i class="{{ $item->icon }}"></i>
                            <span>{{ $item->name }}</span>
                        </a>
                        @if ($item->menuChild->count())
                            <ul class="sub" style="display: none">
                                @foreach ($item->menuChild as $item2)
                                    <li><a href="boxed_page.html">{{ $item2->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                
                <li>
                    <a class="@yield('asset', '')" href="">
                        <i class="fa fa-dashboard"></i>
                        <span>Asset</span>
                    </a>
                    <ul class="sub" style="display: none">
                        <li class="@yield('sub-menu', '')"><a href="{{ route('product.list') }}">Product</a></li>
                        <li class="@yield('sub-menu1', '')"><a href="{{ route('brand.list') }}">Brand</a></li>
                        <li class="@yield('sub-menu2', '')"><a href="{{ route('vehicle.list') }}">Vehicle</a></li>
                        <li class="@yield('sub-menu3', '')"><a href="{{ route('type.list') }}">Type</a></li>
                    </ul>
                </li>
                <li>
                    <a class="@yield('info', '')" href="{{ route('info.home') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Infomation</span>
                    </a>
                </li>

                {{-- <li class="sub-menu">
                    <a class="@yield('active-user')" href="{{ route('user.list') }}">
                        <i class="fa fa-laptop"></i>
                        <span>User management</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="@yield('active-role')" href="{{ route('role.list') }}">
                        <i class="fa fa-laptop"></i>
                        <span>Role management</span>
                    </a>
                </li> --}}
               {{-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub" style="display: none">
                        <li><a href="boxed_page.html">Boxed Page</a></li>
                        <li><a href="horizontal_menu.html">Horizontal Menu</a></li>
                        <li><a href="language_switch.html">Language Switch Bar</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub" style="display: none">
                        <li><a href="general.html">General</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="widget.html">Widget</a></li>
                        <li><a href="slider.html">Slider</a></li>
                        <li><a href="tree_view.html">Tree View</a></li>
                        <li><a href="nestable.html">Nestable</a></li>
                        <li><a href="grids.html">Grids</a></li>
                        <li><a href="calendar.html">Calender</a></li>
                        <li><a href="draggable_portlet.html">Draggable Portlet</a></li>
                    </ul>
                </li> --}}
                 {{-- <li>
                    <a href="fontawesome.html">
                        <i class="fa fa-bullhorn"></i>
                        <span>Fontawesome </span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Data Tables</span>
                    </a>
                    <ul class="sub" style="display: none">
                        <li><a href="basic_table.html">Basic Table</a></li>
                        <li><a href="responsive_table.html">Responsive Table</a></li>
                        <li><a href="dynamic_table.html">Dynamic Table</a></li>
                        <li><a href="editable_table.html">Editable Table</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Form Components</span>
                    </a>
                    <ul class="sub" style="display: none">
                        <li><a href="form_component.html">Form Elements</a></li>
                        <li><a href="advanced_form.html">Advanced Components</a></li>
                        <li><a href="form_wizard.html">Form Wizard</a></li>
                        <li><a href="form_validation.html">Form Validation</a></li>
                        <li><a href="file_upload.html">Muliple File Upload</a></li>

                        <li><a href="dropzone.html">Dropzone</a></li>
                        <li><a href="inline_editor.html">Inline Editor</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Mail </span>
                    </a>
                    <ul class="sub" style="display: none">
                        <li><a href="mail.html">Inbox</a></li>
                        <li><a href="mail_compose.html">Compose Mail</a></li>
                        <li><a href="mail_view.html">View Mail</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub" style="display: none">
                        <li><a href="morris.html">Morris</a></li>
                        <li><a href="chartjs.html">Chartjs</a></li>
                        <li><a href="flot_chart.html">Flot Charts</a></li>
                        <li><a href="c3_chart.html">C3 Chart</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub" style="display: none">
                        <li><a href="google_map.html">Google Map</a></li>
                        <li><a href="vector_map.html">Vector Map</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-glass"></i>
                        <span>Extra</span>
                    </a>
                    <ul class="sub" style="display: none">
                        <li><a href="blank.html">Blank Page</a></li>
                        <li><a href="lock_screen.html">Lock Screen</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="invoice.html">Invoice</a></li>
                        <li><a href="pricing_table.html">Pricing Table</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="gallery.html">Media Gallery</a></li>
                        <li><a href="404.html">404 Error</a></li>
                        <li><a href="500.html">500 Error</a></li>
                        <li><a href="registration.html">Registration</a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span>Login Page</span>
                    </a>
                </li> --}}
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->