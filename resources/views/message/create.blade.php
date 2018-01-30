@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header">Mensagens</h1>
        <div class="table-responsive">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('message.index') }}">Mensagens</a></li>
                <li class="breadcrumb-item active">Enviar</li>
            </ol>
            <form method="post" action="{{ route('message.store') }}">
                {{ csrf_field() }}

                <input type="hidden" name="user_id" value="{{  Auth::id() }}" readonly="readonly">

                <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
                    <label for="text">Mensagem</label>
                    <input type="text" name="text" class="form-control" placeholder="Texto">
                    @if($errors->has('text'))
                        <span class="help-block">
                            <strong>{{ $errors->first('text') }}</strong>
                        </span>
                    @endif
                </div>
                <button class="btn btn-info">Enviar</button>
            </form>
        </div>
    </div>
@endsection
