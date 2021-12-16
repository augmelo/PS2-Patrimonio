@extends('layouts.app')

@section('title', 'Alterar Componente')

@section('content')

<form action="{{ route('component.update', $component) }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <input type="text" name="component[name]" class="form-control @error('component.name') is-invalid @enderror" placeholder="Nome" value="{{ old('component.name') ?? $component->name }}">
        @error('component.name')
        <div class="invalid-feedback">
            {{ $errors->first('component.name') }}
        </div>
        @enderror
    </div>

    <div class="text-center">
        <button class="btn btn-primary active">
            Salvar
        </button>
    </div>

</form>

<div class="row my-4">
    <div class="col text-right">
        <button class="btn btn-danger" data-toggle="modal" data-target="#confirm-modal">
            Excluir Componente
        </button>
    </div>
</div>

<div id="confirm-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Componente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja excluir o componente <strong>{{ $component->name }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('component.destroy', $component) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>    
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection