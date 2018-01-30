@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header">Mensagens</h1>
        <div class="table-responsive">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Mensagens</li>
            </ol>
            <p>
                <a class="btn btn-info" href="{{route('message.create')}}">Enviar Mensagem</a>
            </p>
            <div align="center">
                {!! $messages->links() !!}
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Mensagem</th>
                    <th colspan="2">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <th><a href="{{ route('message.show', $message->id  ) }}">{{ $message->id }}</a></th>
                        <td>{{ $message->user->name }}</td>
                        <td>{{ $message->text }}</td>
                        <td>
                            <form action="{{ route('message.destroy', $message->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">
                                    Apagar
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('message.edit', $message->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="GET">
                                <button class="btn btn-info">
                                    Editar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div align="center">
                {!! $messages->links() !!}
            </div>
        </div>
    </div>

@endsection
