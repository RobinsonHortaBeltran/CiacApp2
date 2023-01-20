<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="estadisticas-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Estadisticas"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @if(session("mensaje") && session("tipo"))
            <div class="alert alert-{{session('tipo')}} alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>{{session('mensaje')}}</strong></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="row">
                <div class="col-4"></div>
                <div class="col-8">

                    <h4>{{$proveedores->name}}/{{$proveedores->email}}</h4>

                </div>
                <div class="col-2"></div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card my-4">
                        <div class="card p-0 position-relative mt-n4 mx-3 z-index-2">

                            <div class="row mb-2">
                                <div class="col">
                                    <div class="card  bg-gradient-info">
                                        <div class="card-header p-3 pt-2  bg-gradient-info">
                                            <div class=" text-white text-center pt-1 mt-2">
                                                <h4>
                                                    <span class="text-white text-center  font-weight-bolder">
                                                        {{-- {{$total}} --}}
                                                    </span>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3 text-center">
                                            <p class="mb-0 text-white text-center text-sm">
                                                INVITACIONES RECIBIDAS
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card  bg-gradient-info">
                                        <div class="card-header p-3 pt-2  bg-gradient-info">
                                            <div class=" text-white text-center pt-1 mt-2">
                                                <p class=" text-white text-sm mb-0 text-capitalize"></p>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3 text-center">
                                            <p class="mb-0">
                                                <span class="text-white text-center text-sm ">
                                                    INVITACIONES ATENDIDAS
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card  bg-gradient-info">
                                        <div class="card-header p-3 pt-2  bg-gradient-info">
                                            <div class=" text-white text-center pt-1 mt-2">
                                                <h4>
                                                    <span class="text-white text-center font-weight-bolder">
                                                        {{-- {{$total_proveedores}} --}}
                                                    </span>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3 text-center">
                                            <p class="mb-0 text-white text-center text-sm">
                                                PARTICIPACION
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container card-body px-0 pb-2 my-4">
                            <div class="table-responsive p-0" style="display: block">
                                <table class="table table-striped align-items-center mb-0" id="estudios"
                                    style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">
                                                ESTUDIO
                                            </th>
                                            <th style="text-align: center">
                                                FECHA Y HORA DE LA INVITACION
                                            </th>
                                            <th style="text-align: center">
                                                GESTOR
                                            </th>
                                            <th style="text-align: center">
                                                PARTICIPO
                                            </th>
                                            <th style="text-align: center">
                                                ITEMS
                                            </th>

                                            {{-- <th style="text-align: center">
                                                CIERRE
                                            </th> --}}
                                            {{-- <th class="text-secondary opacity-7 align-items-center"></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $estudios as $estudio)
                                        <tr>
                                            <td>
                                                {{$estudio->estudio }}
                                            </td>
                                            <td>
                                                {{$estudio->created_at }}
                                            </td>
                                            <td>
                                                {{$estudio->invite_creator->name }} <br>
                                                {{$estudio->invite_creator->email }}
                                            </td>
                                            <td>
                                               NO
                                            </td>
                                            <td>
                                                0/1
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
                <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />
                <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
<script>
$(document).ready(function ($) {
$('#estudios').DataTable();
});
</script>
            </div>
        </div>
    </main>

</x-layout>
