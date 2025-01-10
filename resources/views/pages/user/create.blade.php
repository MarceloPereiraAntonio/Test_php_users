@extends('layouts.app')

@section('title', 'Novo usuário')

@section('content')
    <div class="shadow rounded">
        @include('layouts.alerts')
        <form action="{{ route('user.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="title" class="form-label">Nome</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" name="name" class="form-control"  placeholder="Nome" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="productPrice" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="productPrice" class="form-label">Nova Senha</label>
                    <div class="input-group">
                        <span class="input-group-text">...</span>
                        <input type="password" name="password" class="form-control"  value="">
                    </div>
                </div>
            <div class="my-2">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('user.index') }}" type="submit" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>

@endsection
