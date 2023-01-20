<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="finalizados-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Estudios finalizados"></x-navbars.navs.auth>
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
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3"
                                style="background: #25438E">
                                <h6 class="text-white mx-3"><strong>ESTUDIOS FINALIZADOS </strong>
                                    {{-- <div class=" me-3 my-3 text-end">
                                        <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#create-proveedores"><i
                                                class="material-icons text-sm">add</i>&nbsp;&nbsp;Crear proveedor</a>
                                    </div> --}}
                            </div>
                        </div>

                        <div class="container card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                SOLICITUD</th>
                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                CARGAR ITEMS</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ESTADO</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                PROVEEDORES
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                CIERRE
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($estudios as $estudio)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $estudio->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $estudio->id }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <button class="btn btn-warning cargar"
                                                                data-id="{{ $estudio->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-info asignar" data-bs-toggle="modal"
                                                                data-bs-target="#create-items"
                                                                data-id="{{ $estudio->id }}"><i
                                                                    class="fas fa-upload"></i> CREAR ITEM</button>
                                                        </div>
                                                        <div class="col-6">

                                                        </div>
                                                    </div>


                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ( $estudio->status=='finalizado')
                                                <span class="badge badge-pill badge-lg bg-gradient-danger">Finalizado</span>
                                                @endif

                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <button class="btn btn-info">PROVEEDORES</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm text-center">{{ $estudio->fecha }}</h6>
                                                </div>
                                            </td>

                                            {{-- <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{
                                                    $proveedor->created_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a rel="tooltip" data-id="{{ $proveedor->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#edit-rol"
                                                    class="btn btn-outline-success btn-sm btn-edit-rol">
                                                    <span class="material-icons">
                                                        edit
                                                    </span>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td> --}}
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <x-items.create-items></x-items-create-items>
            </div>
            <x-modals.create-items></x-modals-create-items>
                <x-modals.create-batch></x-modals.create-batch>
            <x-modals.create-proveedores></x-modals.create-proveedores>
        </div>
    </main>
    <x-plugins></x-plugins>
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
             $('#table-items').DataTable();
            $(document).on("click", ".asignar", function () {
                let id = $(this).data("id");

                $("#id_estudio").val(id);
            });

            $(document).on("click", ".cargar", function () {

                let id = $(this).data("id");
                // $(".list_items").css("display", "block");
                $("#id_estudio").val(id);
                let data = {
                    id: id
                }
                let url = `{{ route('get.items')}}`;
                $.ajax({
                    url: url,
                    method: "post",
                    data: data,
                    datatype: "json",
                    success: function (respuesta) {

                        //console.log(respuesta);
                        $('#table-items tbody').empty();
                        respuesta.forEach(e => {
                            var detalle = '<tr style="cursor:pointer;"> ' +
                                '<td style="text-align:center;"  >' + e.id + '</td>' +
                                '<td style="text-align:center;"  >' + e.material + '</td>' +
                                '<td style="text-align:center;"  >' + e.servicio + '</td>' +
                                '<td style="text-align:center;"  >' + e.cantidad + '</td>' +
                                '<td style="text-align:center;"  >' + e.u_medida + '</td>' +
                                '<td style="text-align:center;"  >' + e.forma_pago + '</td>' +
                                '</tr>';
                            $('#table-items tbody').append(detalle);

                        });
                    },
                    error: function () {
                        console.log("No se ha podido obtener la información");
                    }
                });
            });
 });
    </script>
    {{-- <script src="{{ asset('assets') }}/js/action.js"></script> --}}
</x-layout>
