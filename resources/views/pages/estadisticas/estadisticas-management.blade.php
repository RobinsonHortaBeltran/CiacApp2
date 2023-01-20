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
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                        <span class="alert-text">
                            IMPORTANTE::NO REFRESQUE NI CIERRE ESTA VENTANA MIENTRAS ESTE PROCESANDO, PERMITA SIEMPRE
                            QUE LOS PROCESOS INICIADOS TERMINEN.
                        </span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card my-4">
                        <div class="card p-0 position-relative mt-n4 mx-3 z-index-2">
                            <!-- <form method="POST" action="{{ route('estadistica.search') }}" class="mt-2"> -->
                            @csrf
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-2">
                                    <div class="input-group input-group-static mb-4">
                                        <label>RANGO</label>
                                        <input type="text" id="rango" name="rango" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group input-group-static mb-4">
                                        <label>BUSCAR POR</label>
                                        <select name="tipo_busqueda" class="form-control" id="tipo_busqueda">
                                            <option selected value="">Seleccione...</option>
                                            <option value="1">Por gestor</option>
                                            <option value="2">Por proveedor</option>
                                            <option value="3">Por estudio</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="row">
                                        <div class="col-4 mt-3">
                                            <button type="button" class="btn bg-gradient-info seacrh">
                                                <i style="font-size: 1rem;"
                                                    class="fas fa-lg fa-search ps-2 pe-2 text-center"></i>
                                            </button>
                                        </div>
                                        <div class="col-4 mt-3">
                                            <button type="button" class="btn bg-gradient-warning limpiar">
                                                <i style="font-size: 1rem;"
                                                    class="fas fa-lg fa-times ps-2 pe-2 text-center"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-2"></div>
                            </div>
                            <!-- </form> -->
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="card  bg-gradient-info">
                                        <div class="card-header p-3 pt-2  bg-gradient-info">
                                            <div class=" text-white text-center pt-1 mt-2">
                                                <h4>
                                                    <span class="text-white text-center  font-weight-bolder">
                                                        {{$total}}
                                                    </span>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3 text-center">
                                            <p class="mb-0 text-white text-center text-sm">
                                                ESTUDIOS EN TOTAL
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col">
                                    <div class="card  bg-gradient-info">
                                        <div class="card-header p-3 pt-2  bg-gradient-info">
                                            <div class=" text-white text-center pt-1 mt-2">
                                                <p class=" text-white text-sm mb-0 text-capitalize">Today's Money</p>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3 text-center">
                                            <p class="mb-0">
                                                <span class="text-white text-center text-sm font-weight-bolder">
                                                    ITEMS SOLICITADOS
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col">
                                    <div class="card  bg-gradient-info">
                                        <div class="card-header p-3 pt-2  bg-gradient-info">
                                            <div class=" text-white text-center pt-1 mt-2">
                                                <h4>
                                                    <span class="text-white text-center font-weight-bolder">
                                                        {{$total_proveedores}}
                                                    </span>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3 text-center">
                                            <p class="mb-0 text-white text-center text-sm">
                                                PROVEEDORES CREADOS
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card  bg-gradient-info">
                                        <div class="card-header p-3 pt-2  bg-gradient-info">
                                            <div class=" text-white text-center pt-1 mt-2">
                                                <h4>
                                                    <span class="text-white text-center  font-weight-bolder">
                                                        {{$borrador}}
                                                    </span>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3 text-center">
                                            <p class="mb-0 text-white text-center text-sm text-capitalize">
                                                ESTUDIOS EN BORRADOR

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card  bg-gradient-info">
                                        <div class="card-header p-3 pt-2  bg-gradient-info">
                                            <div class=" text-white text-center pt-1 mt-2">
                                                <h4>
                                                    <span class="text-white text-center  font-weight-bolder">
                                                        {{$activos}}
                                                    </span>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3 text-center">
                                            <p class="mb-0 text-white text-center text-sm text-capitalize">
                                                ESTUDIOS ACTIVOS
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card  bg-gradient-info">
                                        <div class="card-header p-3 pt-2  bg-gradient-info">
                                            <div class=" text-white text-center pt-1 mt-2">
                                                <h4>
                                                    <span class="text-white text-center  font-weight-bolder">
                                                        {{$finalizados}}
                                                    </span>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3 text-center">
                                            <p class="mb-0 text-white text-sm mb-0 text-capitalize">
                                                ESTUDIOS FINALIZADOS
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container card-body px-0 pb-2 my-4">
                            <div class="row">
                                <div class="col-12 table-responsive p-0 prov" style="display: none" id="prov">
                                    <table class="table table-striped align-items-center mb-0" id="proveedores"
                                        style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">
                                                    ID
                                                </th>
                                                <th style="text-align: center">
                                                    NOMBRE
                                                </th>
                                                <th style="text-align: center">
                                                    EMAIL</th>
                                                <th style="text-align: center">
                                                    INVITADOS</th>
                                                <th style="text-align: center">
                                                    PARTICIPADOS</th>
                                                <th style="text-align: center">
                                                    RANKING
                                                </th>
                                                {{-- <th style="text-align: center">
                                                    CIERRE
                                                </th> --}}
                                                {{-- <th class="text-secondary opacity-7 align-items-center"></th> --}}
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-12 table-responsive p-0 gest" style="display: none" id="gest">
                                        <table class="table table-striped align-items-center mb-0 gestores" id="gestores"
                                            style="text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">
                                                        GESTOR
                                                    </th>

                                                    <th style="text-align: center">
                                                        EMAIL</th>
                                                    <th style="text-align: center">
                                                        ESTUDIOS</th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
                <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />
                <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

                <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
                <script>

                    $(document).ready(function ($) {
                        $(document).on("click", ".seacrh", function () {
                            let tipo = $("#tipo_busqueda").val();
                            switch (tipo) {
                                case '1':
                                    $("#gest").css("display", "block");
                                    $(".prov").css("display", "none");
                                    cargarGestores();
                                    break;
                                case '2':
                                    $(".prov").css("display", "block");
                                    $("#gest").css("display", "none");
                                    cargar();
                                    break;
                                default:
                                    break;
                            }
                        });
                        $(document).on("click", ".limpiar", function () {
                            window.location.reload();
                         });
                        function cargar() {

                            // let url = `{{ route('estadistica.search2')}}`;
                            let data = {
                                'tipo': $("#tipo_busqueda").val(),
                                '_token': "{{ csrf_token() }}"
                            }
                            let table = $('#proveedores').DataTable({
                                "destroy": true,
                                "ajax": {
                                    url: "{{ route('estadistica.search')}}",
                                    method: "POST",
                                    data: data
                                },
                                columns: [
                                    { data: 'id' },
                                    {
                                        data: 'name',
                                        render: function (data, type) {
                                            if (type === 'display') {
                                                let link = '';

                                                return '<a class="redicrect" href="#">' + data + '</a>';
                                            }
                                            return data;
                                        },
                                    },
                                    { data: 'email' },
                                    { data: 'invitado' },
                                    { data: 'participadas' },
                                    { data: 'ranking' },
                                ], dom: 'Bfrtip',
                                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                            });

                            obtenert_data("#proveedores tbody", table);
                        }

                        function cargarGestores() {

                            let data = {
                                'tipo': $("#tipo_busqueda").val(),
                                '_token': "{{ csrf_token() }}"
                            }

                            $('.gestores').DataTable(
                                {
                                     "destroy": true,
                                    "ajax": {
                                        url: "{{ route('estadistica.search')}}",
                                        method: "POST",
                                        data: data
                                    },
                                    columns: [
                                        { data: 'name' },
                                        { data: 'email' },
                                        { data: 'estudio' },
                                    ],
                                }
                            );

                            // obtenert_data("#proveedores tbody", table);
                        }

                        function obtenert_data(tbody, table) {
                            $(tbody).on("click", ".redicrect", function () {
                                let data = table.row($(this).parents("tr")).data();

                                window.location.href = "estadistica.show.proveedor/" + data.id
                            })
                        }
                    });
                </script>
            </div>
        </div>
    </main>

</x-layout>
