@extends('layouts.app')

@section('title', 'Cadastrar Setor')

@section('content')

<form action="{{ route('sector.store') }}" method="POST">
    @csrf
    
    <div class="form-group">
        <input type="text" name="sector[name]" class="form-control @error('sector.name') is-invalid @enderror" placeholder="Nome" value="{{ old('sector.name') }}">
        @error('sector.name')
        <div class="invalid-feedback">
            {{ $errors->first('sector.name') }}
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