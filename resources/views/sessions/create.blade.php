<x-layout bodyClass="bg-gray-200">
        <main class="main-content  mt-0">
            <div class="row">
                <div class="col-md-4" style="background-image: url('{{ asset('assets') }}/img/aviones.png');">
                    <div class="mt-5">
                        <div class="row signin-margin">
                            <div class="col-lg-8 col-md-8 col-12 mx-auto mt-8">
                                <div class="card z-index-0 fadeIn3 fadeInBottom">
                                    <div class="card-header z-index-1">
                                        <div style="background: #25438E;" class="shadow-primary border-radius-lg py-3 pe-1" >

                                            <div class="row">
                                                <div style="margin-left: 100px;background-image: url('https://www.ciac.gov.co/site/img/logo_ciac_w.png');height: 100px;background-repeat: no-repeat; align-content: center;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" method="POST" action="{{ route('login') }}" class="text-start">
                                            @csrf
                                            @if (Session::has('status'))
                                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                                <span class="text-sm">{{ Session::get('status') }}</span>
                                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                                    data-bs-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @endif
                                            <div class="input-group input-group-outline mt-3">
                                                <label class="form-label">Correo electronico</label>
                                                <input type="email" class="form-control" name="email" value="">
                                            </div>
                                            @error('email')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="input-group input-group-outline mt-3">
                                                <label class="form-label">Contraseña</label>
                                                <input type="password" class="form-control" name="password" value=''>
                                            </div>
                                            @error('password')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror

                                            <div class="text-center">
                                                <button type="submit" style="background: #25438E" class="btn text-white w-100 my-4 mb-2">Ingresar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {{-- <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button> --}}


                                    <a  class="font-weight-bold" style="color: #25438E;" href="{{ route('clave.reset') }}">
                                        {{ __('Recuperar contraseña') }}
                                    </a>

                            </div>
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="page-header  min-vh-100"
                style="background-image: url('{{ asset('assets') }}/img/montaje.png');">
                <span class=""></span>

                {{-- <x-footers.guest></x-footers.guest> --}}
            </div>
                </div>
            </div>

        </main>
        @push('js')
<script src="{{ asset('assets') }}/js/jquery.min.js"></script>
<script>
    $(function() {

    var text_val = $(".input-group input").val();
    if (text_val === "") {
      $(".input-group").removeClass('is-filled');
    } else {
      $(".input-group").addClass('is-filled');
    }
});
</script>
@endpush
</x-layout>
