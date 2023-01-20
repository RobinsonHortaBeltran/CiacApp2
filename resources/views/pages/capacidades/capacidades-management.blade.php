<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="capacidades-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Capacidades"></x-navbars.navs.auth>
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
                                <h6 class="text-white mx-3"><strong>ADMINISTRACION DE CAPACIDADES </strong>
                                    {{-- <div class=" me-3 my-3 text-end">
                                        <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#create-user"><i
                                                class="material-icons text-sm">add</i>&nbsp;&nbsp;Crear usuario</a>
                                    </div> --}}
                            </div>
                        </div>

                        <div class="card-body container px-0 pb-2">

                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group input-group-static mb-4">
                                            <a href="#" data-bs-toggle="modal" class="cargar_aeronave"
                                                data-bs-target="#create-aeronave"><i
                                                    class="fas fa-plus"></i>&nbsp;&nbsp;</a>
                                            <label style="color:#25438E;font-weight: bold;">Aeronaves</label>
                                            <select name="aeronaves" class="form-control" id="aeronaves">
                                                <option selected value="">Seleccione...</option>
                                                @foreach ($aeronaves as $aeronave)
                                                <option value="{{$aeronave->id}}">{{$aeronave->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group input-group-static mb-4">
                                            <a href="" data-bs-toggle="modal" class="cargar_aeronave"
                                                data-bs-target="#create-capacidades"><i
                                                    class="fas fa-plus"></i>&nbsp;&nbsp;</a>
                                            <label style="color:#25438E;font-weight: bold;">Capacidades</label>
                                            <select name="aeronaves" class="form-control" id="capacidades">
                                                <option selected value="">Seleccione...</option>
                                                @foreach ($capacidades as $capacidad)
                                                <option value="{{$capacidad->id}}">{{$capacidad->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group input-group-static mb-4">
                                            <a href="" data-bs-toggle="modal" class="cargar_aeronave"
                                                data-bs-target="#create-otras-capacidades"><i
                                                    class="fas fa-plus"></i>&nbsp;&nbsp;</a>
                                            <label style="color:#25438E;font-weight: bold;">Otras capacidades</label>

                                            <select name="aeronaves" class="form-control" id="otas_capacidades">
                                                <option selected value="">Seleccione...</option>
                                                @foreach ($otras as $otra)
                                                <option value="{{$otra->id}}">{{$otra->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('invite2.proveedores')}}" method="post">
                                            @csrf
                                            <div class="input-group input-group-static mb-4">
                                                {{-- {{$estudios}} --}}
                                                <label style="color:#25438E;font-weight: bold;">Estudios </label>
                                                <select name="estudio" class="form-control" required id="estudio">
                                                    <option selected value="">Seleccione...</option>
                                                    @foreach ($estudios as $estudio)
                                                    <option value="{{$estudio->id}}">Estudio #{{$estudio->id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <textarea style="display: none;" name="proveedores" id="proveedores"
                                                    cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-lg text-white w-100 my-4 mb-2"
                                                    style="background: #25438E">GUARDAR EN BORRADOR</button>
                                            </div>
                                        </form>
                                        {{-- <a href="">
                                            <i class="fas fa-sync" style="width: 100px;" class="btn btn-info"></i>
                                        </a> --}}

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-success configuracion">Actualizar informacion</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="table-capacidades">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="select-all">
                                                </div>
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                PROVEEDOR</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                AERONAVE/CAPACIDAD</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                OTAS CAPACIDADES</th>
                                            {{--
                                            <th class="text-secondary opacity-7"></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($proveedores as $proveedor)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column" style="text-align: center">
                                                        <div class="form-check">
                                                            <input class="form-check-input id_proveedor"
                                                                data-id="{{$proveedor->id }}" type="checkbox"
                                                                value="{{$proveedor->id }}"
                                                                id="proveedor{{$proveedor->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$proveedor->name }}</h6>

                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">

                                                @foreach ($proveedor->proveedor_configuracion as $config)

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $config->aeronave }}" id="capacidad">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{ $config->nombre_aeronave }}/{{
                                                        $config->nombre_capacidad }}
                                                    </label>
                                                </div>


                                                @endforeach
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($proveedor->proveedor_configuracion!="")
                                                @foreach ($proveedor->proveedor_configuracion as $config)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $config->otra_capacidad }}" id="otrasCapacidades">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{ $config->nombre_otra_capacidad }}
                                                    </label>
                                                </div>
                                                @endforeach
                                                @endif

                                            </td>
                                            {{--<td class="align-middle text-center">
                                                @if ( $user->status==1)
                                                <span
                                                    class="badge badge-pill badge-lg bg-gradient-success">Activo</span>
                                                @endif
                                                @if ( $user->status==0)
                                                <span
                                                    class="badge badge-pill badge-lg bg-gradient-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{
                                                    $user->created_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a rel="tooltip" data-id="{{ $user->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#edit-user"
                                                    class="btn btn-outline-success btn-sm btn-editar-user">
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
                                {{-- <div name="seleccionados" id="seleccionados" class="row">
                                    @foreach ($proveedores as $proveedor)
                                    {{$proveedor->id }}
                                    @endforeach
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-modals.create-aeronave></x-modals.create-aeronave>
            <x-modals.create-capacidades></x-modals.create-capacidades>
            <x-modals.create-otras-capacidades></x-modals.create-otras-capacidades>
            <x-footers.auth></x-footers.auth>
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
            <script>
                $(document).ready(function () {
                    $("#table-capacidades").dataTable();
                    let arrayProveedores = [];
                    $(document).on("click", ".cargar_aeronave", function () {
                        let url = `{{ route('get.proveedores')}}`;
                        $.ajax({
                            url: url,
                            method: "get",
                            datatype: "json",
                            success: function (respuesta) {

                                $('.proveedores').empty();
                                $('#proveedores_otra').empty();
                                $('#proveedores_capacidades').empty();
                                let charge_select = "";
                                let seleccione = '<option value="">Seleccione</option>';
                                respuesta.forEach(element => {

                                    let htmlservice = '<option value="' + element.id + '">' + element.name + '</option>';
                                    charge_select += htmlservice;
                                });
                                seleccione += charge_select;
                                $('.proveedores').append(seleccione);
                                $('#proveedores_otra').append(seleccione);
                                $('#proveedores_capacidades').append(seleccione);

                            },
                            error: function () {
                                console.log("No se ha podido obtener la información");
                            }
                        });
                    });
                    $('#select-all').click(function (event) {
                        if (this.checked) {
                            // Iterate each checkbox
                            $('.id_proveedor').each(function () {
                                this.checked = true;
                                let id = $(this).data("id");
                                arrayProveedores.push(id);

                            });
                        } else {
                            $('.id_proveedor').each(function () {
                                this.checked = false;
                                let id = $(this).data("id");
                                arrayProveedores = arrayProveedores.filter(item => item !== id)

                            });
                        }
                        $("#proveedores").val(arrayProveedores);
                    });

                    $(document).on("click", ".id_proveedor", function () {
                        let id = $(this).data("id");
                        if (document.getElementById("proveedor" + id).checked) {

                            arrayProveedores.push(id);
                        } else {
                            let value = id
                            arrayProveedores = arrayProveedores.filter(item => item !== value)
                        }

                        $("#proveedores").val(arrayProveedores);
                    });
                    $(document).on("click", ".configuracion", function () {
                        let texto_aeronave = $("#aeronaves").find('option:selected').text();
                        let texto_capacidades = $("#capacidades").find('option:selected').text();
                        let texto_otas_capacidades = $("#otas_capacidades").find('option:selected').text();
                        let proveedor = $("#proveedores").val();
                        let aeronave = $("#aeronaves").val();
                        let capacidad = $("#capacidades").val();
                        let otras = $("#otas_capacidades").val();

                        let data = {
                            aeronave: aeronave,
                            texto_aeronave:texto_aeronave,
                            capacidad: capacidad,
                            texto_capacidades:texto_capacidades,
                            otras: otras,
                            texto_otas_capacidades:texto_otas_capacidades,
                            proveedores: proveedor,
                            _token: "{{ csrf_token() }}",
                        }

                        let url = `{{ route('store.configuracion.proveedor')}}`;
                        $.ajax({
                            url: url,
                            method: "post",
                            data: data,
                            datatype: "json",
                            success: function (respuesta) {
                                console.log(respuesta);

                            },
                            error: function () {
                                console.log("No se ha podido obtener la información");
                            }
                        });

                    });

                });
            </script>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
