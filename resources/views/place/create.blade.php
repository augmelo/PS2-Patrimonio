@extends('layouts.app')

@section('title', 'Cadastrar Local')

@section('content')

<form action="{{ route('place.store') }}" method="POST">
    @csrf
    
    <div class="form-group">
        <input type="text" name="place[name]" class="form-control @error('place.name') is-invalid @enderror" placeholder="Nome" value="{{ old('place.name') }}">
        @error('place.name')
        <div class="invalid-feedback">
            {{ $errors->first('place.name') }}
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