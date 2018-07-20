@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Roles</div>

                <div class="panel-body">                                        
                    <p><strong>Nombre</strong>     {{ $role->name }}</p>
                    <p><strong>Slug</strong>     {{ $role->slug }}</p>
                    <p><strong>Descripción</strong>  {{ $role->description }}</p>
                    <div align="center" >
                        <a href="{{ route('roles.index') }}" class="btn btn-default">Regresar</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection