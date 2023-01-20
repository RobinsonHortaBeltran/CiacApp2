<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="estudios-proveedor-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Estudios de mercado"></x-navbars.navs.auth>
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
                                <h6 class="text-white mx-3"><strong>ESTUDIOS DE MERCADO </strong>
                                    {{-- <div class=" me-3 my-3 text-end">
                                        <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#create-proveedores"><i
                                                class="material-icons text-sm">add</i>&nbsp;&nbsp;Crear proveedor</a>
                                    </div> --}}
                            </div>
                        </div>

                        <div class="container card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="estudios-proveedor">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">
                                                ID
                                            </th>
                                            <th style="text-align: center">
                                                SOLICITUD</th>
                                            <th style="text-align: center">
                                                ITEMS</th>

                                            <th style="text-align: center">
                                                CIERRE
                                            </th>
                                            {{-- <th class="text-secondary opacity-7 align-items-center"></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($estudios as $estudio )
                                        <tr>
                                            <td>
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center">
                                                    <h6 class="mb-0 text-sm">{{ $estudio->id }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center">
                                                    <button class="btn btn-info solicitud">SOLICITUD #{{ $estudio->id
                                                        }}</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center">
                                                    <button class="btn btn-danger items"
                                                        data-id="{{ $estudio->id}}">ABRIR SOLICITUD</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center">
                                                    <h6 class="mb-0 text-sm">Cierre recepcion de informacion {{
                                                        $estudio->proveedor_estudio->fecha }}</h6>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="modal fade" id="invite-proveedor" tabindex="-1" role="dialog"
                        aria-labelledby="modal-default" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal- modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title font-weight-normal" id="modal-title-default">INVITAR
                                        PROVEEDOR
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
                    </div> --}}
                </div>

                {{-- <x-items.create-items></x-items-create-items> --}}
            </div>
            {{-- <x-modals.create-items></x-modals-create-items>
                <x-modals.list-proveedores></x-modals.list-proveedores>
                <x-modals.create-batch></x-modals.create-batch>
                <x-modals.create-proveedores></x-modals.create-proveedores> --}}
        </div>
    </main>
    <x-plugins></x-plugins>
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {

            $('#estudios-proveedor').DataTable();

            $(document).on("click", ".items", function () {
                let id = $(this).data("id");
                swal({
                    title: "INFORMACION IMPORTANTE",
                    text: "HAGA CLIC PARA CONFIRMAR QUE HA LEIDO, ENTENDIDO Y ACEPTADO",
                    text: "Una vez leido y confirmado se redireccionara a una ventana nueva, dependiendo de la cantidad de items en el estudio o su velocidad de internet" +
                        " el proceso tardara mas o menos tiempo. Sea paciente, no refresque la ventana ni interrumpa el proceso",
                    icon: "warning",
                    buttons: ["Cancelar", "Continuar"],
                    dangerMode: false,
                })
                    .then((willDelete) => {
                        if (willDelete) {

                            swal('' + id, {
                                icon: "success",
                            });
                            window.location.href = '/items-proveedor/' + id;
                        } else {
                            //    window.location.href = '/estudios-proveedor';
                        }
                    });


                // $("#id_estudio").val(id);
            });
            // $(document).on("click", ".asignar-proveedor", function () {
            //     let id = $(this).data("id");

            //     $("#id_estudio_proveedor").val(id);
            // });

            // $(document).on("click", ".list-proveedor", function () {
            //     let id = $(this).data("id");

            //     data = {
            //         "_token": "{{ csrf_token() }}",
            //         "id": id
            //     }
            //     let url = `{{ route('get.invite.proveedores')}}`;
            //     $.ajax({
            //         url: url,
            //         method: "post",
            //         data: data,
            //         datatype: "json",
            //         success: function (respuesta) {

            //             $('.ajax-response').empty();
            //             respuesta.forEach(e => {
            //                 var detalle = '<ul class="list-group"> ' +
            //                     '<li class="list-group-item">' + e.email + '</li>' +
            //                     '</ul>';
            //                 $('.ajax-response').append(detalle);

            //             });
            //         },
            //         error: function () {
            //             console.log("No se ha podido obtener la información");
            //         }
            //     });
            // });

            // $(document).on("click", ".cargar", function () {

            //     let id = $(this).data("id");

            //     $("#id_estudio").val(id);
            //     let data = {
            //         id: id
            //     }
            //    $('#table-items').DataTable(
            //         {
            //             "destroy": true,
            //             "ajax": {
            //                 url: "{{ route('get.items')}}",
            //                 method: "POST",
            //                 data: data
            //             },
            //             columns: [
            //                 { data: 'id' },
            //                 { data: 'material' },
            //                 { data: 'servicio' },
            //                 { data: 'cantidad' },
            //                 { data: 'u_medida' },
            //                 { data: 'forma_pago' },
            //             ],
            //         }
            //     );
            // });
        });
    </script>
    {{--
    <script src="{{ asset('assets') }}/js/action.js"></script> --}}
</x-layout>
