@extends('layouts.app')

@section('title', 'Patrimônios')

@section('content')
    <form action="{{ route('patrimony.index') }}" class="row align-items-center">
        <div class="col-md-6">
            <div class="form-group">
                <label for="filter">Filtrar por: </label>
                <select name="filtro" class="form-control w-50 @error('filtro') is-invalid @enderror">
                    <option selected disabled>Selecione um filtro</option>
                    @foreach(config('patrimony.filters') as $filter)
                        <option 
                            value="{{ $filter['value'] }}"
                            {{ (old('filtro') === $filter['value']) || $searchFilter === $filter['value'] ? 'selected' : '' }}
                        >
                            {{ $filter['label'] }}
                        </option>
                    @endforeach
                </select>
                @error('filtro')
                <div class="invalid-feedback">
                    {{ $errors->first('filtro') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group w-50 ml-auto">
                <input 
                    type="text" 
                    name="pesquisa" 
                    class="form-control 
                    @error('pesquisa') is-invalid @enderror" 
                    placeholder="Buscar..." 
                    value="{{ $search ?? old('pesquisa') }}"
                >
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-fw fa-search"></i>
                    </button>
                </div>
                @if(isset($searchFilter) && isset($search))
                <div class="input-group-append">
                    <a href="{{ route('patrimony.index') }}" class="btn btn-outline-secondary">
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
            
        </div>
    </form>

    <table class="table table-striped w-100">
        <thead>
            <tr class="bg-primary text-white">
                <th>ID</th>
                <th>Patrimônio</th>
                <th>Componente</th>
                <th>Modelo</th>
                <th>IP</th>
                <th>Local</th>
                <th>Setor</th>
                @if(auth()->user()->role == 'Administrador')
                    <th>Ações</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($patrimonies as $patrimony)
            <tr>
                <td>{{ $patrimony->id }}</td>
                <td>{{ $patrimony->number }}</td>
                <td>{{ $patrimony->component->name }}</td>
                <td>{{ $patrimony->type->name }}</td>
                <td>{{ $patrimony->ip }}</td>
                <td>{{ $patrimony->place->name }}</td>
                <td>{{ $patrimony->sector->name }}</td>
                @if(auth()->user()->role == 'Administrador')
                    <td>
                        <a href="{{ route('patrimony.edit', $patrimony) }}" class="btn btn-primary active text-white btn-sm">
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
            Mostrando {{ $patrimonies->firstItem() }} até {{ $patrimonies->lastItem() }} de {{ $patrimonies->total() }} registros
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            {!! $patrimonies->links() !!}
        </div>
    </div>

@endsection