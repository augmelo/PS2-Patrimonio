@extends('layouts.app')

@section('title', 'Modelos')

@section('tools')
    <div class="row">
        <div class="col">
            @if(auth()->user()->role == 'Administrador')
            <a href="{{ route('type.create') }}" class="btn btn-primary">
                Cadastrar Modelo
            </a>
            @endif
        </div>
        <div class="col">
            <form action="{{ route('type.index') }}">
                <div class="input-group">
                    <input 
                        type="text" 
                        name="pesquisa" 
                        class="form-control 
                        @error('pesquisa') is-invalid @enderror" 
                        placeholder="Buscar..." 
                        value="{{ request()->get('pesquisa') }}"
                    >
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-fw fa-search"></i>
                        </button>
                    </div>
                    @if(request()->has('pesquisa'))
                    <div class="input-group-append">
                        <a href="{{ route('type.index') }}" class="btn btn-outline-secondary">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                    </div>
                    @endif
                    @error('pesquisa')
                        <div class="invalid-feedback">
                            {{ $errors->first('pesquisa') }}
                        </div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
    
    
@endsection

@section('content')
    
<table class="table table-striped w-100">
    <thead>
        <tr class="bg-primary text-white">
            <th width="1%">ID</th>
            <th>Nome</th>
            @if(auth()->user()->role == 'Administrador')
            <th width="1%">Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($types as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                @if(auth()->user()->role == 'Administrador')
                <td>
                    <a href="{{ route('type.edit', $type) }}" class="btn btn-primary active text-white btn-sm">
                        <i class="fa fa-fw fa-pen"></i>
                    </a>
                </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

<div class="row">
    <div class="col-md-6">
        Mostrando {{ $types->firstItem() }} até {{ $types->lastItem() }} de {{ $types->total() }} registros
    </div>
    <div class="col-md-6 d-flex justify-content-end">
        {!! $types->links() !!}
    </div>
</div>

@endsection