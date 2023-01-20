<div class="row">
    <div class="col-4">
       <div style="margin-left: 100px;background-image: url('https://www.ciac.gov.co/site/img/logo_ciac_w.png');height: 100px;background-repeat: no-repeat; align-content: center;"></div>
    </div>
    <div class="col-4">
        <h1>CUADRO COMPARATIVO SOLICITUD </h1>
    </div>
    <div class="col-4">

    </div>

</div>
<table class="table align-items-center mb-0" style="border: solid 1px;" id="table-items">
    <thead>
        <tr>
            <th class="bg-gradient-info">
                <div class="form-check">
                    {{-- <input class="form-check-input" type="checkbox" id="select-all"> --}}
                    ID
                </div>
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                style="background-color: rgb(55, 119, 231)">
                MATERIAL</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                DESCRIPCION DEL MATERIAL</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                PARTE NUMERO </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                PARTE NUMERO ALTERNO</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                CONDICION </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                CANTIDAD </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                U/M </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                FORMAS DE PAGO </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                CONDICION OFERTADA </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                U/M OFERTADA </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                CANTIDAD OFERTADA </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                VR UNITARIO SIN IVA </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                TOTAL SIN IVA </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                TIEMPO DE ENTREGA EN DIAS </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                VALIDEZ OFERTA EN DIAS </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                INCOTERMS </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                GARANTIA </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                MONEDA </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="background-color: rgb(55, 119, 231)">
                OBSERVACIONES </th>

        </tr>
    </thead>
    <tbody>
        @foreach ($cotizaciones as $item )
        <tr>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h6 class="mb-0 text-sm">{{ $item->id }}</h6>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->material}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->desc_material}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->parte_numero}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->parte_numero_alterno}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->condicion_requerida}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->cantidad}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->u_medida}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->forma_pago}}
                </div>
            </td>
           <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->condicion_ofertada}}
                </div>
            </td>
<td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->um_ofertada}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->cantidad_ofertada}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->vlr_unidad_sin_iva}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->total_sin_iva}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->entrega_en_dias}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->validez_en_dias}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->incoterms}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->garantia}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->moneda}}
                </div>
            </td>
            <td>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    {{ $item->observaciones}}
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
