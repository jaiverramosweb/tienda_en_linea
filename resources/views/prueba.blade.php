<div class="form-group  col-12 col-md-6">
    <label for="client_id">Cliente</label>
    <select class="form-control" name="client_id" id="client_id">
      <option>== Seleccione el Cliente ==</option>
      @foreach ($clients as $client)
          <option value="{{ $client->id }}">{{ $client->name }}</option>        
      @endforeach
    </select>
</div>

<div class="form-group  col-12 col-md-6">
    <label for="tax">Impuesto</label>
    <input type="number" name="tax" id="tax" class="form-control">
</div>

<div class="form-group  col-12 col-md-6">
    <label for="product_id">Producto</label>
    <select class="form-control" name="product_id" id="product_id">
      <option>== Seleccione el Proveedor ==</option>
      @foreach ($products as $product)
          <option value="{{ $product->id }}_{{ $product->stock }}_{{ $product->price }}">{{ $product->name }}</option>        
      @endforeach
    </select>
</div>

<div class="form-group  col-12 col-md-6">
    <label for="stock">Stock</label>
    <input type="number" name="stock" id="stock" class="form-control" disabled>
</div>

<div class="form-group  col-12 col-md-6">
    <label for="quantity">Cantidad</label>
    <input type="number" name="quantity" id="quantity" class="form-control">
</div>

<div class="form-group  col-12 col-md-6">
    <label for="discount">Porcentaje de descuento</label>
    <input type="number" name="discount" id="discount" class="form-control">
</div>

<div class="form-group  col-12 col-md-6">
    <label for="price">Precio</label>
    <input type="number" name="price" id="price" class="form-control" disabled>
</div>








@extends('layouts.admin')

@section('title', 'Gestion de Categorias')
    
@section('create')
{{-- <li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{ route('categories.create') }}">
        <span class="btn btn-primary">+ Crear Categoria</span>
    </a>
</li> --}}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Gestion de Categorias
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item active">Categoria</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Categorias</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('categories.create') }}" class="dropdown-item">Agregar</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $category->id }}</th>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                {{-- {!! Form::open(['route' => 'categories.delete',$category], 'method' => 'DELETE') !!}

                                                    <a href="{{ route('categories.edit', $category) }}" title="Editar" class="jsgrid-button jsgrid-edit-button">
                                                        <i class="far fa-edit"></i>
                                                    </a>

                                                    <a href="{{ route('categories.delete', $category) }}" type="submit" title="Eliminar" class="jsgrid-button jsgrid-edit-button">
                                                        <i class="far fa-trash-all"></i>
                                                    </a>

                                                {!! Form::close() !!} --}}
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