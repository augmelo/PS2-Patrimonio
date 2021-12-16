@extends('layouts.app')

@section('title', 'Cadastrar Modelo')

@section('content')

<form action="{{ route('type.store') }}" method="POST">
    @csrf
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="type[name]" class="form-control @error('type.name') is-invalid @enderror" placeholder="Nome" value="{{ old('type.name') }}">
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
                    <option value="{{ $component->id }}" {{ $component->id == old('type.component_id') ? 'selected' : '' }}>{{ $component->name }}</option>
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
            Cadastrar
        </button>
    </div>

</form>

@endsection