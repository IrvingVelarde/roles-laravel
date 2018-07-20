@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Roles
                </div>
                <div class="panel-body">
                    @can('roles.create')
                     <a href="{{ route('roles.create') }}" class="btn btn-primary"> <span class="fas fa-plus-square" aria-hidden="true"></span> Agregar Rol</a>
                     <p>
                    @endcan
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Role</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                @can('roles.show')
                                <td width="10px">
                                    <a href="{{ route('roles.show',$role->id) }}" class="btn btn-info"><span class="fas fa-eye" aria-hidden="true"></span> Ver</a>
                                </td>
                                @endcan

                                @can('roles.edit')
                                <td width="10px">
                                    <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-warning"><span class="fas fa-edit" aria-hidden="true"></span> Editar</a>
                                </td>
                                @endcan

                                @can('roles.destroy')
                                <td width="10px">
                                    {!!Form::open(['route'=>['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
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
                        {{ $roles->render() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection