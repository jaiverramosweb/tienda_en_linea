@extends('layouts.admin')

@section('title', 'Registrar Producto')
    
@section('styles')
    {!! Html::style('select2/dist/css/select2.min.css') !!}
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

    
    {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="row">
            
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="" required>
                            </div>

                            <div class="form-group">
                            <label for="shopt_description">Extracto</label>
                            <textarea class="form-control" name="shopt_description" id="shopt_description" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="long_description">Descripción</label>
                                <textarea class="form-control" name="long_description" id="long_description" rows="8"></textarea>
                            </div>  

                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select class="form-control" id="category">
                                <option> == Seleccione una Categoria == </option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>                                      
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subcategory_id">Subcategoria</label>
                            <select class="form-control" name="subcategory_id" id="subcategory_id">
                                <option> == Seleccione una Sub Categoria == </option>
                                @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>                                      
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

                        <div class="form-group">
                            <label for="tags">Etiquetas</label>
                            <select class="form-control" name="tags[]" id="tags" multiple>
                                <option> == Seleccione Etiquetas == </option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>                              
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Imagenes del producto</h4>
                      <input type="file" name="images[]" class="dropify" data-height="300" multiple/>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mr-2">+ Crear</button>
        <a href="{{ route('products.index') }}" class="btn btn-light">Cancelar</a>

    {!! Form::close() !!}


</div>
@endsection

@section('scripts')
    <script src="melody/js/dropzone.js"></script>
    <script src="melody/js/dropify.js"></script>
    {!! Html::script('select2/dist/js/select2.min.js ') !!}
    {!! Html::script('ckeditor/ckeditor.js ') !!}
    
    <script>
        CKEDITOR.replace('long_description');
    </script>

    <script>
        $(document).ready(function() {
            $('#category').select2();
            $('#subcategory_id').select2();
            $('#provider_id').select2();
            $('#tags').select2();                        
        });
    </script>
@endsection