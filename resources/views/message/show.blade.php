@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header">Mensagens</h1>
        <div class="panel-body">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('message.index') }}">Mensagens</a></li>
                <li class="breadcrumb-item active">Detalhes</li>
            </ol>
            <p><b>Id: </b>{{ $message->id }}</p>
            <p><b>Usuário: </b>{{ $message->user->name }}</p>
            <p><b>Texto: </b>{{ $message->text }}</p>
            <p><b>Criada: </b>{{ $message->created_at }}</p>
            <p><b>Enviada: </b>{{ $message->updated_at  }}</p>
        </div>
    </div>
@endsection
