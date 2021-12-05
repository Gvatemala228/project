@extends('layouts.main')

@section('content_section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Подтверждение email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Повторное письмо для подтверждения email было отправлено!') }}
                        </div>
                    @endif

                    Пожалуйста зайдите на почту и перейдите по ссылке для подтверждения email.
                    Если письмо не пришло,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">нажмите здесь, чтобы отправить ещё раз</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
