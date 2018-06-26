@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Usuarios
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>XD</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @can('users.show')
                                <td width="10px">
                                    <a href="{{ route('users.show',$user->id) }}" class="btn btn-info"><span class="fas fa-eye" aria-hidden="true"></span> Ver</a>
                                </td>
                                @endcan

                                @can('users.edit')
                                <td width="10px">
                                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning"><span class="fas fa-edit" aria-hidden="true"></span> Editar</a>
                                </td>
                                @endcan

                                @can('users.destroy')
                                <td width="10px">
                                    {!!Form::open(['route'=>['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                                    <button class="btn btn-danger"> <span class="fas fa-trash" aria-hidden="true"></span> 
                                        Eliminar
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div align="center">
                        {{ $users->render() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection