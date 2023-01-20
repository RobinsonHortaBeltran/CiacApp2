<div class="row">
    <div class="col-md-4">

        <div class="modal fade" id="create-proveedores" tabindex="-1" role="dialog" aria-labelledby="modal-default"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-weight-normal" id="modal-title-default">CREAR NUEVO PROVEEDOR</h6>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 card">

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('registro.proveedores') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Razon social</label>
                                                        <input type="text" id="name" name="name"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Codigo</label>
                                                        <input type="text" id="code" name="code"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Email</label>
                                                        <input type="email" id="email" name="email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Confirmacion de email</label>
                                                        <input type="email" id="email_confirm" name="email_confirm"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn bg-gradient-info btn-lg btn-block"
                                                        style="background: #25438E; width: 100%;" >GUARDAR</button>
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
