@extends('layouts.app')

@section('title', 'Alterar Patrimônio')

@section('content')

<form class="card-body border rounded" action="{{ route('patrimony.update', $patrimony) }}" method="POST">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <input type="text" name="patrimony[number]" class="form-control number @error('patrimony.number') is-invalid @enderror" placeholder="Patrimônio" value="{{ old() ? old('patrimony.number') : $patrimony->number  }}">
                @error('patrimony.number')
                <div class="invalid-feedback">
                    {{ $errors->first('patrimony.number') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select name="patrimony[component_id]" class="form-control @error('patrimony.component_id') is-invalid @enderror">
                    <option selected disabled>Componente</option>
                    @foreach($components as $component)
                    <option value="{{ $component->id }}" {{ (old('patrimony.component_id') ?? $patrimony->component_id) == $component->id ? 'selected' : '' }}>{{ $component->name }}</option>
                    @endforeach
                </select>
                @error('patrimony.component_id')
                <div class="invalid-feedback">
                    {{ $errors->first('patrimony.component_id') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select name="patrimony[type_id]" class="form-control @error('patrimony.type_id') is-invalid @enderror">
                    <option selected disabled>Modelo</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ (old('patrimony.type_id') ?? $patrimony->type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('patrimony.type_id')
                <div class="invalid-feedback">
                    {{ $errors->first('patrimony.type_id') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <input name="patrimony[ip]" type="text" class="form-control ip @error('patrimony.ip') is-invalid @enderror" placeholder="IP" value="{{  old() ? old('patrimony.ip') : $patrimony->ip }}">
                @error('patrimony.ip')
                <div class="invalid-feedback">
                    {{ $errors->first('patrimony.ip') }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <select name="patrimony[place_id]" class="form-control @error('patrimony.place_id') is-invalid @enderror">
                    <option selected disabled>Local</option>
                    @foreach($places as $place)
                    <option value="{{ $place->id }}" {{ (old('patrimony.place_id') ?? $patrimony->place_id) == $place->id ? 'selected' : '' }}>{{ $place->name }}</option>
                    @endforeach
                </select>
                @error('patrimony.place_id')
                <div class="invalid-feedback">
                    {{ $errors->first('patrimony.place_id') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select name="patrimony[sector_id]" class="form-control @error('patrimony.sector_id') is-invalid @enderror">
                    <option selected disabled>Setor</option>
                    @foreach($sectors as $sector)
                    <option value="{{ $sector->id }}" {{ (old('patrimony.sector_id') ?? $patrimony->sector_id) == $sector->id ? 'selected' : '' }}>{{ $sector->name }}</option>
                    @endforeach
                </select>
                @error('patrimony.sector_id')
                <div class="invalid-feedback">
                    {{ $errors->first('patrimony.sector_id') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select name="patrimony[user_id]" class="form-control @error('patrimony.user_id') is-invalid @enderror">
                    <option selected disabled>Atendente</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ (old('patrimony.user_id') ?? $patrimony->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('patrimony.user_id')
                <div class="invalid-feedback">
                    {{ $errors->first('patrimony.user_id') }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <input type="text" name="patrimony[note]" class="form-control @error('patrimony.note') is-invalid @enderror" placeholder="Observações" value="{{  old() ? old('patrimony.note') : $patrimony->note }}">
        @error('patrimony.note')
        <div class="invalid-feedback">
            {{ $errors->first('patrimony.note') }}
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
            Excluir Patrimônio
        </button>
    </div>
</div>

<div id="confirm-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Patrimônio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja excluir o patrimônio <strong>{{ $patrimony->number }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('patrimony.destroy', $patrimony) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>    
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/patrimony/form.js') }}"></script>
@endpush