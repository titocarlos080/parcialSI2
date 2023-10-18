<div class="slimscroll-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li>
                <a href="{{route('home')}}">
                    <i class="fas fa-home"></i>
                    <span> Inicio </span>
                </a>
            </li>



            <li class="menu-item">
                <a href="{{ route('gestionar_productos') }}">
                    <i class="fas fa-archive"></i>
                    <span>Gestionar inventarios</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ route('gestionar_productos') }}"><i class="fas fa-cube"></i> Productos </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="{{ route('gestionar_sucursales') }}">
                    <i class="fas fa-building"></i> <span>Sucursales </span> 
                </a>
            </li>


            <li class="menu-item">
                <a href="{{ route('gestionar_empleados') }}">
                    <i class="fas fa-users"></i> <span>Empleados</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('gestionar_pedidos') }}">
                    <i class="fas fa-shopping-cart"></i><span>Pedidos</span> 
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('gestionar_reportes') }}">
                    <i class="fas fa-chart-bar"></i> <span>Reportes </span> 
                </a>
            </li>


            <li class="menu-item">
                <a href="{{ route('gestionar_notaventa') }}">
                    <i class="fas fa-file-alt"></i> <span>Notas de Ventas</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('gestionar_Historial') }}">
                    <i class="fas fa-file-alt"></i> <span>Historial</span>
                </a>
            </li>

           



        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->