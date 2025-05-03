<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">
            <h5>IE Admin Panel</h5>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <li class="nav-item">
                    <h1 style="font-size:26px;background-color:aqua;color:#691111;text-align: center;border:solid;">
                        <b>{{\Illuminate\Support\Facades\Auth::user()->floor->name?? ''}} </b>
                    </h1>

                    <h1 style="font-size:26px;background-color:aqua;color:#691111;text-align: center;border:solid;">
                        <b> {{\Illuminate\Support\Facades\Auth::user()->line->name?? ''}} </b>
                    </h1>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->user_type ==2)
                <li class="nav-item">
                    <a href="{{route('productForm')}}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            QI Form
                        </p>
                    </a>
                </li>

             
                <li class="nav-item">

                    <a href="{{route('generalFormView')}}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            General Info Form
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('measurement_form')}}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            Measurement Form
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('measurement')}}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            Measurement List
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('npt_create') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            NPT ADD
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('npt_list') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            NPT list
                        </p>
                    </a>
                </li>


                @endif
                <span style="display: inline-block; margin-top: 10px;">
            <a href="{{ url('/target-page') }}" class="btn btn-success" style="background-color: #fcfffd; border-radius: 25px; padding: 6px 15px; width: 100%; max-width: 300px; text-align: center;">
                <i class="fab fa-whatsapp" style="margin-right: 8px;"></i> Contact Responsible
            </a>
        </span>
                @if(\Illuminate\Support\Facades\Auth::user()->user_type ==1)
                <li class="nav-item">
                    <a href="{{ url('/view-summary') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            View Summary
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('general_info') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            General Info
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('quality_check_view') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            QualityCheck View
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('quality_check') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            QualityCheck
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li
                            class="nav-item {{ (request()->is('user-list','user-create')) ? 'menu-is-opening menu-open' : '' }}">
                            <a href="{{route('user.list')}}"
                                class="nav-link {{ request()->routeIs('user.list')? 'active' : '' }}">
                                <p style="font-size:110%;font-weight:bold;">
                                    <i class="fas fa-arrow-right"></i>
                                    User List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('userCreate')}}" class="nav-link ">
                                <p style="font-size:110%;font-weight:bold;">
                                    <i class="fas fa-arrow-right"></i>
                                    User Create
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            Master Setup
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('floorList')}}" class="nav-link">
                                <p style="font-size:110%;font-weight:bold;">
                                    <i class="fas fa-arrow-right"></i>
                                    Floor Setup
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('lineList')}}" class="nav-link">
                                <p style="font-size:110%;font-weight:bold;">
                                    <i class="fas fa-arrow-right"></i>
                                    Line Setup
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('buyerList')}}" class="nav-link">
                                <p style="font-size:110%;font-weight:bold;">
                                    <i class="fas fa-arrow-right"></i>
                                    Buyer Setup
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('processList')}}" class="nav-link">
                                <p style="font-size:110%;font-weight:bold;">
                                    <i class="fas fa-arrow-right"></i>
                                    Process Setup
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('mcList')}}" class="nav-link">
                                <p style="font-size:110%;font-weight:bold;">
                                    <i class="fas fa-arrow-right"></i>
                                    MC Setup
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('defectList')}}" class="nav-link">
                                <p style="font-size:110%;font-weight:bold;">
                                    <i class="fas fa-arrow-right"></i>
                                    Defect Code Setup
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('tenCardList')}}" class="nav-link">
                                <p style="font-size:110%;font-weight:bold;">
                                    <i class="fas fa-arrow-right"></i>
                                    TenCard Setup
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sizeList')}}" class="nav-link">
                                <p style="font-size:110%;font-weight:bold;">
                                    <i class="fas fa-arrow-right"></i>
                                    Size Setup
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('oparetor_create') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p style="font-size:115%;font-weight:bold;">
                                    Operator Setup
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('designation') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p style="font-size:115%;font-weight:bold;">
                                    Designation Setup
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('operator_list') }}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p style="font-size:115%;font-weight:bold;">
                                    Operator List
                                </p>
                            </a>
                        </li>
                </li>
                </li>
            </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p style="font-size:115%;font-weight:bold;">
                        Report
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('generalReport')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                General(All-Outputs)
                            </p>
                        </a>
                        {{-- <a href="{{route('ie_report')}}" class="nav-link">--}}
                            {{-- <p style="font-size:110%;font-weight:bold;">--}}
                                {{-- <i class="fas fa-arrow-right"></i>--}}
                                {{-- IE Report--}}
                                {{-- </p>--}}
                            {{-- </a>--}}
                        <a href="{{route('buyer_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                Buyer(Prod-Defect)
                            </p>
                        </a>
                        <a href="{{route('quality_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                Quality Report(1D)
                            </p>
                        </a>
                        <a href="{{route('dhu_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                Efficiency Report (DHU)
                            </p>
                        </a>
                        <a href="{{route('measurement_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                Measurement Report
                            </p>
                        </a>
                        <a href="{{route('npt_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                NPT Report
                            </p>
                        </a>
                        <a href="{{route('buyer_new_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                Buyer New Report
                            </p>
                        </a>
                        <a href="{{route('opp_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                Operator Performance Report
                            </p>
                        </a>

                        <a href="{{ route('operator_skill_metrix_report') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p style="font-size:115%;font-weight:bold;">
                                Operator Skill Matrix Report
                            </p>

                        </a>

                    </li>
                </ul>
            </li>
            @endif

            @if(\Illuminate\Support\Facades\Auth::user()->user_type ==3)
            <li class="nav-item">
                <a href="{{ url('/view-summary') }}" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p style="font-size:115%;font-weight:bold;">
                        View Summary
                    </p>
                </a>
            </li>

            <li class="nav-item">
                    <a href="{{route('productForm')}}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p style="font-size:115%;font-weight:bold;">
                            Hourly Production
                        </p>
                    </a>
                </li>
                
            <li class="nav-item">
                <a href="{{ route('measurement') }}" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p style="font-size:115%;font-weight:bold;">
                        Measurement
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('npt_create') }}" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p style="font-size:115%;font-weight:bold;">
                        NPT ADD
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('npt_list') }}" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p style="font-size:115%;font-weight:bold;">
                        NPT List
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('operator_performances_add') }}" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p style="font-size:115%;font-weight:bold;">
                        OP Performances Add
                    </p>

                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('operator_skill_metrix_add') }}" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p style="font-size:115%;font-weight:bold;">
                        Operator Skill Matrix Add
                    </p>

                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('operator_skill_metrix') }}" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p style="font-size:115%;font-weight:bold;">
                        Operator Skill Matrix
                    </p>

                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p style="font-size:115%;font-weight:bold;">
                        Report
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a></br>
                <a href="http://192.168.6.166:8000/" style="color: gray;  font-weight: bold; text-align: center;border:dotted;">🚀 What's Coming Next ?? --</a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('generalReport')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                General(All-Outputs)
                            </p>
                        </a>
                        <a href="{{route('buyer_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                Buyer(Prod-Defect)
                            </p>
                        </a>
                        <a href="{{route('quality_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                Quality Report(1D)
                            </p>
                        </a>
                        <!-- <a href="{{route('dhu_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                Efficiency Report (DHU)
                            </p>
                        </a> -->
                        <a href="{{route('measurement_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                Measurement Report
                            </p>
                        </a>
                        <a href="{{route('npt_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                NPT Report
                            </p>
                        </a>
                        <a href="{{route('opp_report')}}" class="nav-link">
                            <p style="font-size:110%;font-weight:bold;">
                                <i class="fas fa-arrow-right"></i>
                                Operator Performance Report
                            </p>
                        </a>

                        <a href="{{ route('operator_skill_metrix_report') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p style="font-size:115%;font-weight:bold;">
                                Operator Skill Matrix Report
                            </p>

                        </a>
                    </li>
                </ul>
            </li>
            @endif
            </ul>
        </nav>
    </div>
</aside>
