<aside class="sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">IE ERP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach($menus as $menu)
                    <li class="nav-item">
                        <a href="{{route($menu->url)}}" class="nav-link active">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                {{ $menu->title ?? '' }}
                                @if($menu->childs->count()>0)
                                    <i class="right fas fa-angle-left"></i>
                                @endif
                            </p>
                        </a>

                        @if($menu->childs->count()>0)
                            @include('partials.manage_chaild_menu', ['childs' => $menu->childs])
                            {{--<ul class="nav nav-treeview">
                                @foreach($menu->childs as $subMenu)
                                    <li class="nav-item">
                                        <a href="{{ route($subMenu->url) }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{$subMenu->title ?? ''}}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>--}}
                        @endif


{{--                        @if($menu->childs->count()>0)
                            <ul class="nav nav-treeview">
                                @foreach($menu->childs as $subMenu)
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link active"
                                           onclick="document.getElementById('workplace').src='{{route($subMenu->url)}}';">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{$subMenu->title ?? ''}}</p>
--}}{{--                                            @if($menu->childs->count()>0)--}}{{--
--}}{{--                                                <i class="right fas fa-angle-left"></i>--}}{{--
--}}{{--                                            @endif--}}{{--
                                        </a>
--}}{{--                                        @if($menu->childs->count()>0)--}}{{--
--}}{{--                                            <ul class="nav nav-treeview">--}}{{--
--}}{{--                                                <li class="nav-item">--}}{{--
--}}{{--                                                <li class="nav-item">--}}{{--
--}}{{--                                                    <a href="javascript:void(0);" class="nav-link active"--}}{{--
--}}{{--                                                       onclick="document.getElementById('workplace').src='{{route($subMenu->url)}}';">--}}{{--
--}}{{--                                                        <i class="far fa-circle nav-icon"></i>--}}{{--
--}}{{--                                                        <p>{{$subMenu->title ?? ''}}</p>--}}{{--
--}}{{--                                                        @if($menu->childs->count()>0)--}}{{--
--}}{{--                                                            <i class="right fas fa-angle-left"></i>--}}{{--
--}}{{--                                                        @endif--}}{{--
--}}{{--                                                    </a>--}}{{--
--}}{{--                                                </li>--}}{{--
--}}{{--                                            </ul>--}}{{--
--}}{{--                                        @endif--}}{{--
                                    </li>
                                @endforeach
                            </ul>
                        @endif--}}
                    </li>
                @endforeach
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
