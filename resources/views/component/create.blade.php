@extends('layouts.app')

@section('title', 'Cadastrar Componente')

@section('content')

<form action="{{ route('component.store') }}" method="POST">
    @csrf
    
    <div class="form-group">
        <input type="text" name="component[name]" class="form-control @error('component.name') is-invalid @enderror" placeholder="Nome" value="{{ old('component.name') }}">
        @error('component.name')
        <div class="invalid-feedback">
            {{ $errors->first('component.name') }}
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