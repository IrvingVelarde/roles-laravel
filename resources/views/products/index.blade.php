@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Productos
                </div>
                <div class="panel-body">
                    @can('products.create')
                     <a href="{{ route('products.create') }}" class="btn btn-primary"> <span class="fas fa-plus-square" aria-hidden="true"></span> Agregar Producto</a>
                     <p>
                    @endcan
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>

                                @can('products.show')
                                <td width="10px">
                                    <a href="{{ route('products.show',$product->id) }}" class="btn btn-info"><span class="fas fa-eye" aria-hidden="true"></span> Ver</a>
                                </td>
                                @endcan

                                @can('products.edit')
                                <td width="10px">
                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning"><span class="fas fa-edit" aria-hidden="true"></span> Editar</a>
                                </td>
                                @endcan

                                @can('products.destroy')
                                <td width="10px">
                                    {!!Form::open(['route'=>['products.destroy', $product->id], 'method' => 'DELETE']) !!}
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
                        {{ $products->render() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection