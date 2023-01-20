<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="borradores-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Estudios borradores"></x-navbars.navs.auth>
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
                                <h6 class="text-white mx-3"><strong>ESTUDIOS EN BORRADOR </strong>
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
                                            <th style="text-align: center">
                                                ID
                                            </th>
                                            <th style="text-align: center">
                                                SOLICITUD</th>
                                            <th style="text-align: center">
                                                CARGAR ITEMS</th>
                                            <th style="text-align: center">
                                                ESTADO</th>
                                            <th style="text-align: center">
                                                PROVEEDORES
                                            </th>
                                            <th style="text-align: center">
                                                CIERRE
                                            </th>
                                            <th class="text-secondary opacity-7">
                                                ACCIONES
                                            </th>
                                            <th class="text-secondary opacity-7">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($estudios as $estudio)
                                        <tr>
                                            <td style="text-align: center">

                                                <p class="mb-0 text-sm">{{ $estudio->id }}</p>

                            </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <h6 class="mb-0 text-sm">{{ $estudio->id }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-warning cargar align-items-center"
                                                data-id="{{ $estudio->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-info asignar" data-bs-toggle="modal"
                                                data-bs-target="#create-items" data-id="{{ $estudio->id }}"><i
                                                    class="fas fa-upload"></i> CREAR ITEM</button>
                                        </div>
                                        <div class="col-6">

                                        </div>
                                    </div>


                                </div>
                            </td>
                            <td class="align-middle text-center align-items-center">
                                @if ( $estudio->status=='borrador')
                                <span class="badge badge-pill badge-lg bg-gradient-warning">Borrador</span>
                                @endif

                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#create-proveedores" data-id="{{ $estudio->id }}">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            {{-- <button class="btn btn-info asignar-proveedor" data-bs-toggle="modal"
                                                data-bs-target="#invite-proveedor" data-id="{{ $estudio->id }}"><i
                                                    class="fas fa-check"></i> INVITAR</button> --}}
                                            <button class="btn btn-info list-proveedor" data-bs-toggle="modal"
                                                data-bs-target="#list-proveedores" data-id="{{ $estudio->id }}"><i
                                                    class="fas fa-list"></i></button>

                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm text-center">{{ $estudio->fecha }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center">
                                    <form action="send.email" method="post">
                                        @csrf
                                        <input type="hidden" id="estudio_id" name="estudio_id" value="{{ $estudio->id }}">
                                    <button type="submit" class="btn btn-danger" data-id="{{ $estudio->id }}">ACTIVAR</button>
                                    </form>
                                </div>

                            </td>
                            <td class="align-middle text-center">
                                <a class="btn btn-success" href="{{route('export-excel-comparativa',$estudio->id)}}">COMPARATIVA</a>
                            </td>
                            {{-- <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{
                                    $proveedor->created_at }}</span>
                            </td>
                            <td class="align-middle">
                                <a rel="tooltip" data-id="{{ $proveedor->id }}" data-bs-toggle="modal"
                                    data-bs-target="#edit-rol" class="btn btn-outline-success btn-sm btn-edit-rol">
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
                <div class="modal fade" id="invite-proveedor" tabindex="-1" role="dialog"
                    aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal- modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title font-weight-normal" id="modal-title-default">INVITAR PROVEEDOR
                                </h6>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 card">
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('estudios.proveedores') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="hidden" id="id_estudio_proveedor"
                                                                name="id_estudio">
                                                            <div class="input-group input-group-static mb-4">
                                                                <label>LISTADO DE PROVEEDOR</label>
                                                                <select class="proveedores form-control"
                                                                    name="proveedores[]" id="proveedores"
                                                                    multiple="true">
                                                                    @foreach ($proveedores as $proveedor)
                                                                    <option value="{{$proveedor->email}}">
                                                                        {{$proveedor->name}}/{{$proveedor->email}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn bg-gradient-info btn-lg btn-block"
                                                                style="background: #25438E; width: 100%;">GUARDAR
                                                                LISTADO</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-items.create-items></x-items-create-items>
        </div>
        <x-modals.create-items></x-modals-create-items>
            <x-modals.create-batch></x-modals.create-batch>
            <x-modals.list-proveedores></x-modals.list-proveedores>
            <x-modals.create-proveedores></x-modals.create-proveedores>
            </div>
    </main>
    <x-plugins></x-plugins>
    @push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $('.proveedores').select2();

            $(document).on("click", ".asignar", function () {
                let id = $(this).data("id");

                $("#id_estudio").val(id);

                data = {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                }
                let url = `{{ route('get-um')}}`;
                $.ajax({
                    url: url,
                    method: "post",
                    data: data,
                    datatype: "json",
                    success: function (respuesta) {
                                $('#u_medida').empty();
                                let charge_select = "";
                                let seleccione = '<option value="">Seleccione</option>';
                                respuesta.unidad_medida.forEach(element => {

                                    let htmlservice = '<option value="' + element.id + '">' + element.name + '</option>';
                                    charge_select += htmlservice;
                                });
                                seleccione += charge_select;
                                $('#u_medida').append(seleccione);


                                $('#forma_pago').empty();
                                let charge_select2 = "";
                                let seleccione2 = '<option value="">Seleccione</option>';
                                respuesta.forma_pago.forEach(element => {

                                    let htmlservice2 = '<option value="' + element.id + '">' + element.name + '</option>';
                                    charge_select2 += htmlservice2;
                                });
                                seleccione2 += charge_select2;
                                $('#forma_pago').append(seleccione2);


                                $('#condicion_requerida').empty();
                                let charge_select3 = "";
                                let seleccione3 = '<option value="">Seleccione</option>';
                                respuesta.condicion.forEach(element => {

                                    let htmlservice3 = '<option value="' + element.id + '">' + element.name + '</option>';
                                    charge_select3 += htmlservice3;
                                });
                                seleccione3 += charge_select3;
                                $('#condicion_requerida').append(seleccione3);

                    },
                    error: function () {
                        console.log("No se ha podido obtener la información");
                    }
                });
            });

            $(document).on("click", ".asignar-proveedor", function () {
                let id = $(this).data("id");

                $("#id_estudio_proveedor").val(id);


            });

            $(document).on("click", ".list-proveedor", function () {
                let id = $(this).data("id");

                data = {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                }
                let url = `{{ route('get.invite.proveedores')}}`;
                $.ajax({
                    url: url,
                    method: "post",
                    data: data,
                    datatype: "json",
                    success: function (respuesta) {

                        $('.ajax-response').empty();
                        respuesta.forEach(e => {
                            var detalle = '<ul class="list-group"> ' +
                                '<li class="list-group-item">' + e.email + '</li>' +
                                '</ul>';
                            $('.ajax-response').append(detalle);

                        });
                    },
                    error: function () {
                        console.log("No se ha podido obtener la información");
                    }
                });
            });

            $(document).on("click", ".cargar", function () {

                let id = $(this).data("id");

                $("#id_estudio").val(id);
                let data = {
                    id: id
                }

                $('#table-items').DataTable(
                    {
                        "destroy": true,
                        "ajax": {
                            url: "{{ route('get.items')}}",
                            method: "POST",
                            data: data
                        },
                        columns: [
                            { data: 'id' },
                            { data: 'material' },
                            { data: 'servicio' },
                            { data: 'cantidad' },
                            { data: 'um.name' },
                            { data: 'pago.name' },
                        ],
                    }
                );
            });
        });
    </script>
    {{--
    <script src="{{ asset('assets') }}/js/action.js"></script> --}}
</x-layout>
