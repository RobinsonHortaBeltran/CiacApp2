@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand  d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">

            <span class=""><img src="{{ asset('assets') }}/img/CIAC--Blanco.png" class="mt-0" alt="main_logo"
                    style="margin-left: 20px;height: 70px;margin-bottom: 10px"></span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">

        <ul class="navbar-nav">
            @if (Auth()->user()->rol_id==1)
            <li class="nav-item mb-2 mt-0">
                <a href="#" class="nav-link text-white btn btn-info text-bold " style="text-align: center;"
                    role="button" data-bs-toggle="modal" data-bs-target="#create-estudio">
                    CREAR ESTUDIO
                </a>
            </li>



            <li class="nav-item mb-2 mt-0">
                <a href="#ProfileNav" class="nav-link text-white collapsed" data-bs-toggle="collapse"
                    aria-controls="ProfileNav" role="button" aria-expanded="false">
                    ESTUDIOS
                </a>
                <div id="ProfileNav" class="collapse">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'borradores-management' ? ' active bg-gradient-info' : '' }} "
                                href="{{ route('borradores.management') }}">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i style="font-size: 1rem;" class="fas fa-lg fa-eraser ps-2 pe-2 text-center"></i>
                                </div>
                                <span class="nav-link-text ms-1">BORRADORES &nbsp;&nbsp;<span
                                        class="badge bg-gradient-warning borrador"> 24</span></span>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'activos-management' ? ' active bg-gradient-info' : '' }}"
                                {{-- --}} href="{{ route('activos.management') }}">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i style="font-size: 1rem;" class="fas fa-lg fa-plane ps-2 pe-2 text-center"></i>
                                </div>
                                <span class="nav-link-text ms-1">ACTIVOS &nbsp;&nbsp;<span
                                        class="badge bg-gradient-info activo"> 24</span></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'finalizados-management' ? ' active bg-gradient-info' : '' }}"
                                {{-- --}} href="{{ route('finalizados.management') }}">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i style="font-size: 1rem;"
                                        class="fas fa-lg fa-solid fa-bell ps-2 pe-2 text-center"></i>
                                </div>
                                <span class="nav-link-text ms-1">FINALIZADOS &nbsp;&nbsp;<span
                                        class="badge bg-gradient-info finalizado"> 24</span></span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link text-white">Hola mundo</a>
                        </li> -->
                    </ul>
                </div>
            </li>
            <hr class="horizontal light mt-0">
            <li class="nav-item mb-2 mt-0">
                <a href="#administracionNav" class="nav-link text-white collapsed" data-bs-toggle="collapse"
                    aria-controls="administracionNav" role="button" aria-expanded="false">
                    ADMINISTRACION
                </a>
                <div id="administracionNav" class="collapse">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'user-management' ? ' active bg-gradient-info' : '' }} "
                                href="{{ route('user-management') }}">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <!-- <i class="fa-thin fa-"></i> -->
                                    <i style="font-size: 1rem;" class="fas fa-lg fa-users ps-2 pe-2 text-center"></i>
                                </div>
                                <span class="nav-link-text ms-1">USUARIOS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'role-management' ? ' active bg-gradient-info' : '' }} "
                                href="{{ route('rol-management') }}">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <!-- <i class="fa-thin fa-"></i> -->
                                    <i style="font-size: 1rem;"
                                        class="fas fa-lg fa-hand-sparkles ps-2 pe-2 text-center"></i>

                                </div>
                                <span class="nav-link-text ms-1">ROLES</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'proveedores-management' ? ' active bg-gradient-info' : '' }} "
                                href="{{ route('proveedores-management2') }}">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <!-- <i class="fa-thin fa-"></i> -->
                                    <i style="font-size: 1rem;" class="fas fa-lg fa-user ps-2 pe-2 text-center"></i>

                                </div>
                                <span class="nav-link-text ms-1">PROVEEDORES</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link text-white">Hola mundo</a>
                        </li> -->
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'estadisticas-management' ? ' active bg-gradient-info' : '' }} "
                    href="{{ route('estadistica.management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">

                        <i style="font-size: 1rem;" class="fas fa-lg fa-chart-bar ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">ESTADISTICAS</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'capacidades-management' ? ' active bg-gradient-info' : '' }} "
                    href="{{ route('capacidades-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">CAPACIDADES</span>
                </a>
            </li>
            @endif
            @if (Auth()->user()->rol_id==3)
            <br>
            <br>
            <li class="nav-item mb-2 mt-0">
                <a href="#administracionNavProveedor" class="nav-link text-white collapsed" data-bs-toggle="collapse"
                    aria-controls="administracionNav" role="button" aria-expanded="false">
                    ADMINISTRACION
                </a>
                <div id="administracionNavProveedor" class="collapse">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'capacidades-proveedor-management' ? ' active bg-gradient-info' : '' }} "
                                href="{{ route('capacidades-proveedor') }}">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <!-- <i class="fa-thin fa-"></i> -->
                                    <i style="font-size: 1rem;" class="fas fa-lg fa-users ps-2 pe-2 text-center"></i>
                                </div>
                                <span class="nav-link-text ms-1">DEFINIR <br> MIS CAPACIDADES</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'estudios-proveedor-management' ? ' active bg-gradient-info' : '' }} "
                                href="{{ route('estudios-proveedor') }}">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <!-- <i class="fa-thin fa-"></i> -->
                                    <i style="font-size: 1rem;"
                                        class="fas fa-lg fa-hand-sparkles ps-2 pe-2 text-center"></i>

                                </div>
                                <span class="nav-link-text ms-1">ESTUDIOS DE <br> MERCADOS</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'proveedores-management' ? ' active bg-gradient-info' : '' }} "
                                href="{{ route('proveedores-management2') }}">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <!-- <i class="fa-thin fa-"></i> -->
                                    <i style="font-size: 1rem;" class="fas fa-lg fa-user ps-2 pe-2 text-center"></i>

                                </div>
                                <span class="nav-link-text ms-1">PROVEEDORES</span>
                            </a>
                        </li> --}}
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link text-white">Hola mundo</a>
                        </li> -->
                    </ul>
                </div>
            </li>
            @endif

            <!-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'tables' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('tables') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li> -->
            <!-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'billing' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('billing') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Billing</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'virtual-reality' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('virtual-reality') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Virtual Reality</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'rtl' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('rtl') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                    </div>
                    <span class="nav-link-text ms-1">RTL</span>
                </a>
            </li> -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Logueado: <br>
                    {{Auth()->user()->name}} </h6>
            </li>
        </ul>



    </div>
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            getDataCount()
            function getDataCount() {
                let url = `{{ route('count.estudios')}}`;
                $.ajax({
                    url: url,
                    method: "get",
                    datatype: "json",
                    success: function (respuesta) {
                        //console.log(respuesta);
                        $(".borrador").html(respuesta.borrador);
                        $(".activo").html(respuesta.activos);
                        $(".finalizado").html(respuesta.finalizado);

                    },
                    error: function () {
                        console.log("No se ha podido obtener la información");
                    }
                });
            }
        });
    </script>
</aside>
