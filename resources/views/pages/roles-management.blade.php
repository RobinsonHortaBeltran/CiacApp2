<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="role-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Administrador de roles"></x-navbars.navs.auth>
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
                                <h6 class="text-white mx-3"><strong>ADMINISTRACION DE ROLES </strong>
                                    <div class=" me-3 my-3 text-end">
                                        <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#create-rol"><i
                                                class="material-icons text-sm">add</i>&nbsp;&nbsp;Crear rol</a>
                                    </div>
                            </div>
                        </div>

                        <div class="container card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="table-roles">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NOMBRE</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ESTADO</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                CREATION DATE
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $role->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $role->name }}</h6>

                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ( $role->status==1)
                                                <span class="badge badge-pill badge-lg bg-gradient-success">Activo</span>
                                                @endif
                                                @if ( $role->status==0)
                                                <span class="badge badge-pill badge-lg bg-gradient-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{
                                                    $role->created_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a rel="tooltip" data-id="{{ $role->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#edit-rol"
                                                    class="btn btn-outline-success btn-sm btn-edit-rol">
                                                    <span class="material-icons">
                                                        edit
                                                    </span>
                                                    <div class="ripple-container"></div>
                                                </a>
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
            <x-modals.create-rol></x-modals.create-rol>
            <x-modals.edit-rol></x-modals.edit-rol>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#table-roles").dataTable();
    $(document).on("click", ".btn-edit-rol", function () {

        let id = $(this).data("id");

        let data = {
            id: id
        }
        let url = `{{ route('rol-show')}}`;
        $.ajax({
            url: url,
            method: "post",
            data: data,
            datatype: "json",
            success: function (respuesta) {
                $("#name_edit_rol").val(respuesta.name);
                $("#status_edit_rol").val(respuesta.status);
                $("#id_rol").val(respuesta.id);
            },
            error: function () {
                console.log("No se ha podido obtener la información");
            }
        });
    });
 });
    </script>
    {{-- <script src="{{ asset('assets') }}/js/action.js"></script> --}}
</x-layout>
