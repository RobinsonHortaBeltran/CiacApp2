<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="listado de items"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Listado de items"></x-navbars.navs.auth>
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
                                <h6 class="text-white mx-3"><strong>LISTADO DE ITEMS </strong>

                            </div>
                        </div>

                        <div class="card-body container px-0 pb-2">

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="input-group input-group-static mb-4">
                                            <a class="btn btn-info"
                                                href="{{route('export-excel',$items[0]->estudio_id)}}">EXCEL</a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group input-group-static mb-4">
                                            <a data-id="{{$items[0]->estudio_id}}" class="btn btn-info estudio" href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#create-batch-cotizacion">BATCH</a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group input-group-static mb-4">
                                            <a data-id="{{$items[0]->estudio_id}}" class="btn btn-info adjuntos" href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#upload-document">ADJUNTOS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid table-responsive p-0">
                                    <table class="table align-items-center mb-0" id="table-items">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">

                                                        ID
                                                    </div>
                                                </th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    MATERIAL</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    DESCRIPCION DEL MATERIAL</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    PARTE NUMERO </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    PARTE NUMERO ALTERNO</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    CONDICION </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    CANTIDAD </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    U/M </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    FORMAS DE PAGO </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    OBSERVACIONES </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ACCIONES </th>
                                                {{--
                                                <th class="text-secondary opacity-7"></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item )
                                            <tr>
                                                <td>
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->id }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        {{ $item->material}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        {{ $item->desc_material}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        {{ $item->parte_numero}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        {{ $item->parte_numero_alterno}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        {{ $item->condicion->name}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        {{ $item->cantidad}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        {{ $item->um->name}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        {{ $item->pago->name}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        {{ $item->servicio}}
                                                    </div>
                                                </td>
                                                <td>


                                                    @if ($item->item_cotizacion == "")
                                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                                        <button class="btn btn-danger " data-editar="{{ $item->id}}">COTIZAR ITEM</button>
                                                    </div>
                                                    @else
                                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                                        <button class="btn btn-info editar" data-bs-toggle="modal" data-bs-target="#editar-item-cotizacion"
                                                            data-editar="{{ $item->id}}"><i class="fas fa-check"></i></button>
                                                    </div>
                                                    @endif

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-modals.create-batch-cotizacion></x-modals.create-batch-cotizacion>
                <x-modals.editar-item-cotizacion></x-modals.editar-item-cotizacion>
                <x-modals.upload-file></x-modals.upload-file>
                <x-footers.auth></x-footers.auth>
                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                    rel="stylesheet" />
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $("#table-items").dataTable();
                        // let arrayProveedores = [];
                        $(document).on("click", ".editar", function () {
                            let id_item = $(this).data("editar");
                            data = {
                                id: id_item,
                                _token: "{{ csrf_token() }}",
                            }
                            let url = `{{ route('get.cotizacion')}}`;
                            $.ajax({
                                url: url,
                                method: "post",
                                datatype: "json",
                                data: data,
                                success: function (respuesta) {

                                    $("#id_cotizacion").val(respuesta.id);
                                    $("#cantidad_ofertada_edt").val(respuesta.cantidad_ofertada);
                                    $("#vlr_unitario_sin_iva").val(respuesta.vlr_unidad_sin_iva);
                                    $("#condicion_ofertada_edt").val(respuesta.condicion_ofertada);
                                    $("#tiempo_entrega_dias").val(respuesta.entrega_en_dias);
                                    $("#um_ofertada").val(respuesta.um_ofertada);
                                    $("#incoterms").val(respuesta.incoterms);
                                    $("#validez_oferta").val(respuesta.validez_en_dias);
                                    $("#garantia").val(respuesta.garantia);
                                    $("#moneda").val(respuesta.moneda);
                                    $("#obs").val(respuesta.observaciones);


                                },
                                error: function () {
                                    console.log("No se ha podido obtener la información");
                                }
                            });
                        });


                        $(document).on("click", ".estudio", function () {
                            let id_estudio = $(this).data("id");
                            $("#estudio_id").val(id_estudio);
                        });
                        $(document).on("click", ".adjuntos", function () {
                            let id_estudio = $(this).data("id");
                            $("#estudio_id_ad").val(id_estudio);
                            $("#estudio_id_list").val(id_estudio);
                        });
                    });
                </script>
            </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
