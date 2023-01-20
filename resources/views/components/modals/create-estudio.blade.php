<div class="row">
    <div class="col-md-4">

        <div class="modal fade" id="create-estudio" tabindex="-1" role="dialog" aria-labelledby="modal-default"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-weight-normal" id="modal-title-default">CREAR NUEVO ESTUDIO</h6>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 card">

                                    <div class="card-body" >
                                        <form method="POST" action="{{ route('registro.estudio') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>SERVICIOS</label>
                                                        <select name="servicio" id="servicio" class="form-control"
                                                            required>
                                                            <option selected value="">Seleccione</option>
                                                            <option value="1">Servicios (no aeronauticos)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>FECHA</label>
                                                        <input type="date" id="fecha" name="fecha" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>ESTUDIO</label>
                                                        <select name="tipo_estudio" class="form-control"
                                                            id="tipo_estudio" required>
                                                            <option selected value="">Seleccione...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>TRM</label>
                                                        <input type="text" id="trm" name="trm"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group input-group-static mb-4">
                                                            <label>ESTADO</label>
                                                            <select name="estatus" class="form-control"
                                                                id="estatus" required>
                                                                <option selected value="">Seleccione...</option>
                                                                <option  value="borrador">BORRADOR</option>
                                                                <option  value="activo">ACTIVO</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group input-group-outline mt-3 col-md-12">
                                                            <label for="documento_cargar" style="width: 100%;">
                                                                <input type="file" class="form-control" style="width: 100%;" name="cargar_documento"
                                                                    id="cargar_documento" required>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>DESCRIPCION</label>
                                                        <textarea style="border: 1px solid" name="description" id="description" class="form-control" cols="30" rows="10"></textarea required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn bg-gradient-info btn-lg btn-block"
                                                        style="background: #25438E; width: 100%;">GUARDAR</button>
                                                </div>
                                            </div>
                                        </form>

                                        <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.1/jquery.maskMoney.min.js"></script>
                                        <script>
                                            $(document).ready(function ($) {

                                                $("#trm").maskMoney()
                                                getData();
                                                function getData() {
                                                    let url = `{{ route('tipos-estudios')}}`;
                                                    $.ajax({
                                                        url: url,
                                                        method: "get",
                                                        datatype: "json",
                                                        success: function (respuesta) {

                                                            $('#tipo_estudio').empty();

                                                            let charge_select = "";

                                                            respuesta.forEach(element => {

                                                                let htmlservice = '<option value="' + element.id + '">' + element.name + '</option>';
                                                                charge_select += htmlservice;
                                                            });
                                                            $('#tipo_estudio').append(charge_select);

                                                        },
                                                        error: function () {
                                                            console.log("No se ha podido obtener la información");
                                                        }
                                                    });
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
