<div class="row">
    <div class="col-md-4">

        <div class="modal fade" id="create-aeronave" tabindex="-1" role="dialog" aria-labelledby="modal-default"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-weight-normal" id="modal-title-default">CREAR AERONAVE </h6>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('aeronave.create') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                <div class="col-6">
                                                    <h5>Proveedor</h5>
                                                    <div class="input-group input-group-outline mt-3 col-md-12">
                                                        <select name="proveedores" class="form-control proveedores" id="proveedores">
                                                            <option value="">Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <h5>Nombre de la aeronave</h5>
                                                    <div class="input-group input-group-outline mt-3 col-md-12">
                                                        <input type="text" class="form-control" id="name_aeronave" name="name_aeronave">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <br>
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
</div>
