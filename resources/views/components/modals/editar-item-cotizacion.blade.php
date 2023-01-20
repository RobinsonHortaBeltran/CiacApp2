<div class="row">
    <div class="col-md-4">

        <div class="modal fade" id="editar-item-cotizacion" tabindex="-1" role="dialog" aria-labelledby="modal-default"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-weight-normal" id="modal-title-default">EDITAR ITEM </h6>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 card">

                                    <div class="card-body" >
                                        <form method="POST" action="{{ route('editar.cotizacion') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <input type="hidden" name="id_cotizacion" id="id_cotizacion">
                                                        <label>Cantidad Ofertada</label>
                                                        <input required type="number" class="form-control" id="cantidad_ofertada_edt" name="cantidad_ofertada_edt">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Vlr Unitario sin IVA</label>
                                                        <input type="text" id="vlr_unitario_sin_iva" name="vlr_unitario_sin_iva" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Condicion ofertada</label>
                                                       <input type="text" class="form-control" id="condicion_ofertada_edt" name="condicion_ofertada_edt">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Tiempo de entrega en dias</label>
                                                        <input type="number" id="tiempo_entrega_dias" name="tiempo_entrega_dias"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group input-group-static mb-4">
                                                            <label>Unidad de medida ofertada</label>
                                                            <select name="um_ofertada" class="form-control" id="um_ofertada"
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
                                                        <label>Incoterms</label>
                                                        <input type="text" id="incoterms" name="incoterms"
                                                            class="form-control" required>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group input-group-static mb-4">
                                                            <label>Validez oferta en dias</label>
                                                            <input type="text" id="validez_oferta" name="validez_oferta"
                                                            class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                       <div class="input-group input-group-static mb-4">
                                                        <label>Garantia</label>
                                                        <input type="text" id="garantia" name="garantia"
                                                            class="form-control" required>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group input-group-static mb-4">
                                                            <label>Moneda en la que cotiza</label>
                                                            <input type="text" id="moneda" name="moneda"
                                                            class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                       <div class="input-group input-group-static mb-4">
                                                        <label>Observaciones item(opcional)</label>
                                                        <input type="text" id="obs" name="obs"
                                                            class="form-control" >
                                                    </div>
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

                                                $("#vlr_unitario_sin_iva").maskMoney()
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
