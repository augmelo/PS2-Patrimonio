@extends('layouts.app')

@section('title', 'Cadastrar Usuário')

@section('content')

<form action="{{ route('user.store') }}" method="POST">
    @csrf
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="user[registration]" class="form-control @error('user.registration') is-invalid @enderror" placeholder="Matrícula" value="{{ old('user.registration') }}">
                @error('user.registration')
                    <div class="invalid-feedback">
                        {{ $errors->first('user.registration') }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input type="text" name="user[name]" class="form-control @error('user.name') is-invalid @enderror" placeholder="Nome" value="{{ old('user.name') }}">
                @error('user.name')
                    <div class="invalid-feedback">
                        {{ $errors->first('user.name') }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="user[username]" class="form-control @error('user.username') is-invalid @enderror" placeholder="Username" value="{{ old('user.username') }}">
                @error('user.username')
                    <div class="invalid-feedback">
                        {{ $errors->first('user.username') }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="user[password]" class="form-control @error('user.password') is-invalid @enderror" placeholder="Senha" value="{{ old('user.password') }}">
                @error('user.password')
                    <div class="invalid-feedback">
                        {{ $errors->first('user.password') }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select name="user[permission]" class="form-control @error('user.permission') is-invalid @enderror">
                    <option selected disabled>Nível de Permissão</option>
                    <option value="0" {{ old('user.permission') == '0' ? 'selected' : '' }}>Comum</option>
                    <option value="1" {{ old('user.permission') == '1' ? 'selected' : '' }}>Administrador</option>
                </select>
                @error('user.permission')
                <div class="invalid-feedback">
                    {{ $errors->first('user.permission') }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="text-center">
        <button class="btn btn-primary active">
            Cadastrar
        </button>
    </div>

</form>

@endsection