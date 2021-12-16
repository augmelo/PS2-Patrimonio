@extends('layouts.app')

@section('title', 'Cadastrar Patrimônio')

@section('content')

<form action="{{ route('patrimony.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <input type="text" name="patrimony[number]" class="form-control number @error('patrimony.number') is-invalid @enderror" placeholder="Patrimônio" value="{{ old('patrimony.number') }}">
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
                    <option value="{{ $component->id }}" {{ $component->id == old('patrimony.component_id') ? 'selected' : '' }}>{{ $component->name }}</option>
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
                    <option value="{{ $type->id }}" {{ $type->id == old('patrimony.type_id') ? 'selected' : '' }}>{{ $type->name }}</option>
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
                <input name="patrimony[ip]" type="text" class="form-control ip @error('patrimony.ip') is-invalid @enderror" placeholder="IP" value="{{ old('patrimony.ip') }}">
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
                    <option value="{{ $place->id }}" {{ $place->id == old('patrimony.place_id') ? 'selected' : '' }}>{{ $place->name }}</option>
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
                    <option value="{{ $sector->id }}" {{ $sector->id == old('patrimony.sector_id') ? 'selected' : '' }}>{{ $sector->name }}</option>
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
                    <option value="{{ $user->id }}" {{ $user->id == old('patrimony.user_id') ? 'selected' : '' }}>{{ $user->name }}</option>
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
        <input type="text" name="patrimony[note]" class="form-control @error('patrimony.note') is-invalid @enderror" placeholder="Observações" value="{{ old('patrimony.note') }}">
        @error('patrimony.note')
        <div class="invalid-feedback">
            {{ $errors->first('patrimony.note') }}
        </div>
        @enderror
    </div>

    <div class="text-center">
        <button class="btn btn-primary active">
            Cadastrar
        </button>
    </div>

</form>

@endsection

@push('js')
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/patrimony/form.js') }}"></script>
@endpush