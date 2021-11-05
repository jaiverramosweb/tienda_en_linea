@extends('layouts.admin')

@section('title', 'Registrar Producto')
    
@section('options')
    {{-- <li class="nav-item nav-settings d-none d-lg-block">
        <a href="#" class="nav-link">
            <i class="fa fa-elipsis-h"></i>
        </a>
    </li> --}}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Crear Producto
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Producto</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!} 
                        
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="" required>
                            </div>
                            
                            <div class="form-group">
                              <label for="category_id">Categoria</label>
                              <select class="form-control" name="category_id" id="category_id">
                                  <option> == Seleccione una Categoria == </option>
                                  @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>                                      
                                  @endforeach
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="provider_id">Proveedor</label>
                                <select class="form-control" name="provider_id" id="provider_id">
                                    <option> == Seleccione un Proveedor == </option>
                                    @foreach ($providers as $provider)
                                      <option value="{{ $provider->id }}">{{ $provider->name }}</option>                                      
                                    @endforeach
                                </select>
                            </div>

                            <div class="custom-file mb-4">
                                <input type="file" class="custom-file-input" id="image" name="image" lang="es">
                                <label for="image" class="custom-file-label">Seleccionar Archivo</label>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">+ Crear</button>
                            <a href="{{ route('products.index') }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    
@endsection