@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="row">
        <div class="col-md-3 mx-auto">
            <div class="card my-5 bg-primary rounded-lg text-white">
                <div class="card-body">
                    <h1 class="text-center h3 font-weight-bold">Login</h1>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username" class="m-0">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $errors->first('username') }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="password" class="m-0">Senha</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @enderror
                        </div>
    
                        <button class="btn btn-primary btn-block active">
                            Entrar
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
