@extends('layouts.app')

@section('title', 'Alterar Senha')

@section('content')

<form action="{{ route('commom.user.update') }}" method="POST">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="user[password]" class="form-control @error('user.password') is-invalid @enderror" placeholder="Nova Senha" value="{{ old('user.password') }}">
                @error('user.password')
                    <div class="invalid-feedback">
                        {{ $errors->first('user.password') }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="text-center">
        <button class="btn btn-primary active">
            Salvar
        </button>
    </div>

</form>

@endsection