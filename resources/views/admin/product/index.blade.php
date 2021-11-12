@extends('layouts.admin')

@section('title', 'Gestion de Producto')
    
@section('create')
{{-- <li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{ route('products.create') }}">
        <span class="btn btn-primary">+ Crear Producto</span>
    </a>
</li> --}}
@endsection

@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Gestion de Producto
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item active">Producto</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Producto</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('products.create') }}" class="dropdown-item">Agregar</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Stock</th>
                                        <th>Estado</th>
                                        <th>Categoria</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $product->id }}</th>
                                            <td>
                                                <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                            </td>
                                            <td>{{ $product->stock }}</td>
                                            <td>
                                                @if ($product->status == 'ACTIVE' )
                                                    <a href="{{ route('products.change.status', $product) }}" class="jsgrid-button btn btn-sm btn-success" title="Activo">
                                                            Activo <i class="fas fa-check"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('products.change.status', $product) }}" class="jsgrid-button btn btn-sm btn-danger" title="Desactivado">
                                                            Desactivado <i class="fas fa-times"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $product->subcategory->name }}</td>
                                            <td>
                                                {!! Form::open(['route' => ['products.destroy',$product], 'method' => 'DELETE']) !!}

                                                    <a href="{{ route('products.edit', $product) }}" title="Editar" class="jsgrid-button jsgrid-edit-button">
                                                        <i class="far fa-edit"></i>
                                                    </a>

                                                    <button type="submit" title="Eliminar" class="jsgrid-button jsgrid-edit-button unstyled-button">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>

                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    {!! Html::script('melody/js/data-table.js') !!}
@endsection