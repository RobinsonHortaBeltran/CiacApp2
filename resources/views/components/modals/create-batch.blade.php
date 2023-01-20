<div class="row">
    <div class="col-md-4">

        <div class="modal fade" id="create-batch" tabindex="-1" role="dialog" aria-labelledby="modal-default"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-weight-normal" id="modal-title-default">CARGAR ITEMS POR MEDIO DE
                            EXCEL</h6>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 card">

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('items.import.excel') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5>SELECCIONAR EXCEL</h5>
                                                    <div class="input-group input-group-outline mt-3 col-md-12">
                                                        <label for="documento_cargar" style="width: 100%;">
                                                            <input type="file" class="form-control" style="width: 100%;"
                                                                name="cargar_documento" id="cargar_documento" required>
                                                        </label>
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
</div>
