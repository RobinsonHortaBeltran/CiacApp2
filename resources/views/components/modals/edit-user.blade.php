<div class="row">
    <div class="col-md-4">

        <div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="modal-default"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-weight-normal" id="modal-title-default">EDITAR INFORMACION DE USUARIO</h6>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 card">

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('actualizar.usuario') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="hidden" name="id_edt" id="id_edt">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Nombre</label>
                                                        <input type="text" id="name_edit_user" name="name_edit_user"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Rol</label>
                                                        <select name="rol_id_edt" class="form-control" id="rol_id_edt">
                                                            <option selected value="">Seleccione...</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Email</label>
                                                        <input type="email" id="email_edit_user" name="email_edit_user" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Contraseña</label>
                                                        <input type="password" id="password" name="password"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>Estado</label>
                                                        <select name="status_user_edt" class="form-control" id="status_user_edt">
                                                            <option value="">Seleccione...</option>
                                                            <option value="1">Activo</option>
                                                            <option value="0">Inactivo</option>

                                                        </select>
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
