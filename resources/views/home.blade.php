@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard :') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Você está logado!') }}

                    <!-- <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center">Cadastrar uma nova conta</a>
                    </p> -->
                    <br>
                    <br>
                    <a id="btn-funcionario" href="{{route('register')}}" class="btn btn-success btn-sm"
                        style=""><strong>Cadastrar um novo usuário</strong></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection