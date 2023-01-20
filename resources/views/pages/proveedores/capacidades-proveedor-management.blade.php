<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="capacidades-proveedor-management"></x-navbars.sidebar>
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

                            </div>
                        </div>

                        <div class="card-body container px-0 pb-2">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">MILITAR</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">CIVIL</button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                        aria-selected="false">Contact</button>
                                </li> --}}
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="table-responsive p-0">
                                        <div class="row">
                                            <div class="col-6">
                                                <table class="table table-hover  align-items-center">
                                                    <thead>
                                                        <th>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="select-all-fija">
                                                                <label for="" class="text-bold">AlA FIJA</label>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <a href="#" class="btn btn-success guardar-alaf-m">Guardar</a>
                                                        </th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($militar as $ml)
                                                        @foreach ($ml->subTipo_item as $value)
                                                        {{-- {{$value}} --}}
                                                        <tr>
                                                            @if ($value->tipo_sub_capaciodad == 1)
                                                            <td>
                                                                <div class="d-flex px-2 py-1">
                                                                    <div class="d-flex flex-column"
                                                                        style="text-align: center">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input ala_fija"
                                                                                data-id="{{$value->id }}"
                                                                                type="checkbox" value="{{$value->id }}"
                                                                                id="ala_fija{{$value->id }}">
                                                                            <label for="">{{$value->name}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <div style="display: none">
                                                    <form id="form_ala_fija_m" action="{{route('storeCapacidadesConfig')}}" method="POST">
                                                        @csrf
                                                        <input  name="ala_fija_m" id="ala_fija_m">
                                                        <input type="text" id="tipo" name="tipo" value="1">
                                                        <input type="text" id="sub_tipo" name="sub_tipo" value="1">
                                                        <button type="submit" id="enviar"></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <table class="table table-hover  align-items-left">
                                                    <thead>
                                                        <th>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="select-all-rotativa">
                                                                <label for="" class="text-bold">AlA ROTATIVA</label>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <a href="#" class="btn btn-success guardar-alaR-m">Guardar</a>
                                                        </th>

                                                    </thead>
                                                    <tbody>
                                                        @foreach ($militar as $ml)
                                                        @foreach ($ml->subTipo_item as $value)
                                                        {{-- {{$value}} --}}
                                                        <tr>
                                                            @if ($value->tipo_sub_capaciodad == 2)
                                                            <td>
                                                                <div class="d-flex px-2 py-1">
                                                                    <div class="d-flex flex-column"
                                                                        style="text-align: center">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input ala_rotativa"
                                                                                data-id="{{$value->id }}"
                                                                                type="checkbox" value="{{$value->id }}"
                                                                                id="ala_rotativa{{$value->id }}">
                                                                            <label for=""> {{$value->name}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <div style="display: none">
                                                    <form id="form_ala_rotativa_m" action="{{route('storeCapacidadesConfig')}}" method="POST">
                                                        @csrf
                                                        <input  name="ala_rotativa_m" id="ala_rotativa_m">
                                                        <input type="text" id="tipo" name="tipo" value="1">
                                                        <input type="text" id="sub_tipo" name="sub_tipo" value="2">
                                                        <button type="submit" id="enviar"></button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="table-responsive p-0">
                                        <div class="row">
                                            <div class="col-6">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <th>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="select-all-fija-civil">
                                                                <label for="" class="text-bold">AlA FIJA</label>
                                                            </div>
                                                        </th>
<th>
                                                            <a href="#" class="btn btn-success guardar-ala-fija-c">Guardar</a>
                                                        </th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($civil as $cv)

                                                        @foreach ($cv->subTipo_item as $valueCv)
                                                        @if ($valueCv->tipo_sub_capaciodad == 3)
                                                            <td>
                                                                <div class="d-flex px-2 py-1">
                                                                    <div class="d-flex flex-column"
                                                                        style="text-align: center">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input ala_fija_civil"
                                                                                data-id="{{$valueCv->id }}"
                                                                                type="checkbox" value="{{$valueCv->id }}"
                                                                                id="ala_fija_civil{{$valueCv->id }}">
                                                                            <label for=""> {{$valueCv->name}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            @endif
                                                        </tr>

                                                        @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div style="display: none;">
                                                <form id="form_ala_fija_c" action="{{route('storeCapacidadesConfig')}}" method="POST">
                                                        @csrf
                                                        <input  name="ala_fija_c" id="ala_fija_c">
                                                        <input type="text" id="tipo" name="tipo" value="2">
                                                        <input type="text" id="sub_tipo" name="sub_tipo" value="3">
                                                        <button type="submit" id="enviar"></button>
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
            <x-modals.create-aeronave></x-modals.create-aeronave>
            <x-modals.create-capacidades></x-modals.create-capacidades>
            <x-modals.create-otras-capacidades></x-modals.create-otras-capacidades>
            <x-footers.auth></x-footers.auth>
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
            <script>
                $(document).ready(function () {
                    $("#table-fija").dataTable();
                    let arrayAlaFija = [];
                    let arrayAlaRotativa = [];
                    let arrayAlaFijaCivil = [];
                    $('#select-all-fija').click(function (event) {
                        if (this.checked) {
                            // Iterate each checkbox
                            $('.ala_fija').each(function () {
                                this.checked = true;
                                let id = $(this).data("id");
                                arrayAlaFija.push(id);

                            });
                        } else {
                            $('.ala_fija').each(function () {
                                this.checked = false;
                                let id = $(this).data("id");
                                arrayAlaFija = arrayAlaFija.filter(item => item !== id)

                            });
                        }

                        $("#ala_fija_m").val(arrayAlaFija);
                    });

                    $(document).on("click", ".ala_fija", function () {
                        let id = $(this).data("id");
                        if (document.getElementById("ala_fija" + id).checked) {

                            arrayAlaFija.push(id);
                        } else {
                            let value = id
                            arrayAlaFija = arrayAlaFija.filter(item => item !== value)
                        }

                      $("#ala_fija_m").val(arrayAlaFija);
                    });

                    $('#select-all-rotativa').click(function (event) {
                        if (this.checked) {
                            // Iterate each checkbox
                            $('.ala_rotativa').each(function () {
                                this.checked = true;
                                let id = $(this).data("id");
                                arrayAlaRotativa.push(id);
                                $("#ala_rotativa_m").val(arrayAlaRotativa);
                            });
                        } else {
                            $('.ala_rotativa').each(function () {
                                this.checked = false;
                                let id = $(this).data("id");
                                arrayAlaRotativa = arrayAlaRotativa.filter(item => item !== id)

                            });
                        }
                        console.log(arrayAlaRotativa);
                       $("#ala_rotativa_m").val(arrayAlaRotativa);
                    });

                    $(document).on("click", ".ala_rotativa", function () {
                        let id = $(this).data("id");
                        if (document.getElementById("ala_rotativa" + id).checked) {

                            arrayAlaRotativa.push(id);
                        } else {
                            let value = id
                            arrayAlaRotativa = arrayAlaRotativa.filter(item => item !== value)
                        }
                        console.log(arrayAlaRotativa);
                        $("#ala_rotativa_m").val(arrayAlaRotativa);
                    });

                    $('#select-all-fija-civil').click(function (event) {
                        if (this.checked) {
                            // Iterate each checkbox
                            $('.ala_fija_civil').each(function () {
                                this.checked = true;
                                let id = $(this).data("id");
                                arrayAlaFijaCivil.push(id);
                                $("#ala_fija_c").val(arrayAlaFijaCivil);
                            });
                        } else {
                            $('.ala_fija_civil').each(function () {
                                this.checked = false;
                                let id = $(this).data("id");
                                arrayAlaFijaCivil = arrayAlaFijaCivil.filter(item => item !== id)

                            });
                        }
                        console.log(arrayAlaFijaCivil);
                        $("#ala_fija_c").val(arrayAlaFijaCivil);
                    });

                    $(document).on("click", ".ala_fija_civil", function () {
                        let id = $(this).data("id");
                        if (document.getElementById("ala_fija_civil" + id).checked) {

                            arrayAlaFijaCivil.push(id);

                        } else {
                            let value = id
                            arrayAlaFijaCivil = arrayAlaFijaCivil.filter(item => item !== value)
                        }
                        console.log(arrayAlaFijaCivil);
                         $("#ala_fija_c").val(arrayAlaFijaCivil);
                    });

                    $(document).on("click", ".guardar-alaf-m", function () {
                        document.getElementById("form_ala_fija_m").submit();
                    });
                    $(document).on("click", ".guardar-alaR-m", function () {
                        document.getElementById("form_ala_rotativa_m").submit();
                    });
                    $(document).on("click", ".guardar-ala-fija-c", function () {
                        document.getElementById("form_ala_fija_c").submit();
                    });
                });
            </script>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
