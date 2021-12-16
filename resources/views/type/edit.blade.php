@extends('layouts.app')

@section('title', 'Alterar Modelo')

@section('content')

<form action="{{ route('type.update', $type) }}" method="POST">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="type[name]" class="form-control @error('type.name') is-invalid @enderror" placeholder="Nome" value="{{ old() ? old('type.name') : $type->name }}">
                @error('type.name')
                <div class="invalid-feedback">
                    {{ $errors->first('type.name') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select name="type[component_id]" class="form-control @error('type.component_id') is-invalid @enderror">
                    <option selected disabled>Componente</option>
                    @foreach($components as $component)
                        <option value="{{ $component->id }}" {{ (old('type.component_id') ?? $type->component_id) == $component->id ? 'selected' : '' }}>{{ $component->name }}</option>
                    @endforeach
                </select>
                @error('type.component_id')
                <div class="invalid-feedback">
                    {{ $errors->first('type.component_id') }}
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

<div class="row my-4">
    <div class="col text-right">
        <button class="btn btn-danger" data-toggle="modal" data-target="#confirm-modal">
            Excluir Modelo
        </button>
    </div>
</div>

<div id="confirm-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Modelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja excluir o modelo <strong>{{ $type->name }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('type.destroy', $type) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>    
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection