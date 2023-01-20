<div class="row">
    <div class="col-md-4">

        <div class="modal fade" id="create-items" tabindex="-1" role="dialog" aria-labelledby="modal-default"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-weight-normal" id="modal-title-default">CREAR NUEVO ITEM</h6>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('registro.manual-item') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="hidden" id="id_estudio" name="id_estudio">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>MATERIAL</label>
                                                        <input type="text" class="form-control" id="material"
                                                            name="material" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">

                                                    <div class="input-group input-group-static mb-4">
                                                        <label>DESCRIPCION MATERIAL</label>
                                                        <input type="text" class="form-control" id="desc_material"
                                                            name="desc_material" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>PARTE NUMERO</label>
                                                        <input type="number" id="parte_numero" name="parte_numero"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>PARTE NUMERO ALTERNO</label>
                                                        <input type="number" id="parte_numero_alterno"
                                                            name="parte_numero_alterno" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>MEDIDAS</label>
                                                        <select name="u_medida" class="form-control" id="u_medida"
                                                            required>
                                                            <option selected value="">Seleccione U/M</option>
                                                            <option value="1">1/CENTIMETRO CUBICO</option>
                                                            <option value="2">1/METRO CUBICO</option>
                                                            <option value="3">1/MINUTO</option>
                                                            <option value="4">ACRE</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>CONDICION REQUERIDA</label>
                                                        <select name="condicion_requerida" class="form-control"
                                                            id="condicion_requerida" required>
                                                            <option selected value="">Seleccione condicion </option>
                                                            <option value="1">AS REMOVED</option>
                                                            <!-- <option value="2">1/METRO CUBICO</option>
                                                            <option value="3">1/MINUTO</option>
                                                            <option value="4">ACRE</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>CANTIDAD</label>
                                                        <input type="number" id="cantidad" name="cantidad"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>FORMA DE PAGO</label>
                                                        <select name="forma_pago" class="form-control" id="forma_pago"
                                                            required>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>DESCRIPCION SERVICIO</label>
                                                        <textarea style="border: 1px solid" name="description"
                                                            id="description" class="form-control" cols="30" rows="10"></textarea required>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
