@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header">Mensagens</h1>
        <div class="table-responsive">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Usuários</li>
            </ol>
            <div align="center">
                {!! $users->links() !!}
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo de Usuário</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th><a href="#">{{ $user->id }}</a></th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form method="post" action="{{ route('user.update', $user) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <select class="form-control" name="role_id" id="role_id" onchange="this.form.submit()">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ ($user->role->id == $role->id) ? 'selected' : '' }} >
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div align="center">
                {!! $users->links() !!}
            </div>
        </div>
    </div>

@endsection
