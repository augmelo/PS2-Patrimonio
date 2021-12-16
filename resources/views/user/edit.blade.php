@extends('layouts.app')

@section('title', 'Alterar Usuário')

@section('content')

<form action="{{ route('user.update', $user) }}" method="POST">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="user[registration]" class="form-control @error('user.registration') is-invalid @enderror" placeholder="Matrícula" value="{{ old() ? old('user.registration') : $user->registration }}">
                @error('user.registration')
                    <div class="invalid-feedback">
                        {{ $errors->first('user.registration') }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input type="text" name="user[name]" class="form-control @error('user.name') is-invalid @enderror" placeholder="Nome" value="{{ old() ? old('user.name') : $user->name }}">
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
                <input type="text" name="user[username]" class="form-control @error('user.username') is-invalid @enderror" placeholder="Username" value="{{ old() ? old('user.username') : $user->username }}">
                @error('user.username')
                    <div class="invalid-feedback">
                        {{ $errors->first('user.username') }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select name="user[permission]" class="form-control @error('user.permission') is-invalid @enderror">
                    <option selected disabled>Nível de Permissão</option>
                    <option value="0" {{ (old('user.permission') ?? $user->permission) == '0' ? 'selected' : '' }}>Comum</option>
                    <option value="1" {{ (old('user.permission') ?? $user->permission) == '1' ? 'selected' : '' }}>Administrador</option>
                </select>
                @error('user.permission')
                <div class="invalid-feedback">
                    {{ $errors->first('user.permission') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="user[password]" class="form-control @error('user.password') is-invalid @enderror" placeholder="Nova Senha" value="{{ old('user.password') }}">
                <small>*Preencha apenas se desejar alterar a senha do usuário</small>
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

@if(auth()->user()->id != $user->id)
    <div class="row my-4">
        <div class="col text-right">
            <button class="btn btn-danger" data-toggle="modal" data-target="#confirm-modal">
                Excluir Usuário
            </button>
        </div>
    </div>

    <div id="confirm-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja excluir o usuário <strong>{{ $user->name }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('user.destroy', $user) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Excluir</button>    
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endif

@endsection