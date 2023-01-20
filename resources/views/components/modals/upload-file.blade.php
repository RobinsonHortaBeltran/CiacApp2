<div class="row">
    <div class="col-md-4">

        <div class="modal fade" id="upload-document" tabindex="-1" role="dialog" aria-labelledby="modal-default"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-weight-normal" id="modal-title-default">CARGAR DOCUMENTOS</h6>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 card">

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('upload.document') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5>SELECCIONAR DOCUMENTO</h5>
                                                     <input type="hidden" id="estudio_id_ad" name="estudio_id_ad">
                                                    <div class="input-group input-group-outline mt-3 col-md-12">
                                                        <label for="documento_cargar" style="width: 100%;">
                                                            <input type="file" class="form-control" style="width: 100%;"
                                                                name="cargar_documento" id="cargar_documento" required>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>


                                            <br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn bg-gradient-info btn-lg btn-block"
                                                        style="background: #25438E; width: 100%;">GUARDAR</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                                <div class="col-12">
                                                    <form action="{{ route('list.document') }}" method="post">
                                                        @csrf
                                                         <input type="hidden" id="estudio_id_list" name="estudio_id_list">
                                                    <button type="submit">Listado de documentos</button>
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
    </div>
</div>
