<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="list-document"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Listar documentos"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">

                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">

                                <table class="table table-hover">
                                    <thead>
                                        <th style="text-align: center">ID</th>
                                        <th style="text-align: center">documento</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($adjuntos as $documento)
                                        <tr>
                                            <td style="text-align: center">
                                                {{$documento->id}}
                                            </td>
                                            <td style="text-align: center" >
                                        <a target="_blank" href="{{ Storage::url($documento->route)}}">{{$documento->name}}</a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                {{-- <ul>
                                    @foreach ($documentos as $documento)
                                    <li><a target="_blank" href="{{ Storage::url($documento->name)}}">{{$documento->name}}</a></li>
                                    @endforeach
                                </ul> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
