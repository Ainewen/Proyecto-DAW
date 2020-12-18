@extends('layouts.tienda')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu dirección de correo electrónico.') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuevo correo se ha envíado a tu e-mail, por favor revísalo y haz click en el link.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, por favor revisa que has recibido un correo nuestro para verificar tu cuenta.') }}
                    {{ __('Sino has recibido el correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __(' haz click aquí para recibir otro.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
