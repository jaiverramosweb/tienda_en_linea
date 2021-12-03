@extends('layouts.admin')

@section('title', 'Editar Producto')
    
@section('styles')
{!! Html::style('melody/vendors/lightgallery/css/lightgallery.css') !!}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Editar Producto
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Producto</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </nav>
        </div>

        {!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">
            
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="number" name="price" id="price" class="form-control @error('name') is-invalid @enderror" value="{{ old('price', $product->price) }}">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            <label for="shopt_description">Extracto</label>
                            <textarea class="form-control @error('name') is-invalid @enderror" name="shopt_description" id="shopt_description" rows="3">
                                {{ old('shopt_description', $product->shopt_description) }}
                            </textarea>
                            @error('shopt_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="long_description">Descripción</label>
                                <textarea class="form-control @error('name') is-invalid @enderror" name="long_description" id="long_description" rows="8">
                                    {{ old('long_description', $product->long_description) }}
                                </textarea>
                                @error('long_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>                                      
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subcategory_id">Subcategoria</label>
                            <select class="form-control" name="subcategory_id" id="subcategory_id">
                                <option disabled selected>-- Seleccione una categoria --</option>                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select class="form-control" name="provider_id" id="provider_id">
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}"
                                        {{ old('provider_id', $product->provider_id) == $provider->id ? 'selected' : '' }}    
                                    >{{ $provider->name }}</option>                                      
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tags">Etiquetas</label>
                            <select class="form-control" name="tags[]" id="tags" multiple>
                                <option> == Seleccione Etiquetas == </option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ collect(old('tags', $product->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}    
                                    >{{ $tag->name }}</option>                              
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <h4 class="card-title">Subir Imagenes</h4>
                            <div class="file-upload-wrapper">
                              <div id="fileuploader">Subir</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Imagenes del producto</h4>
                      <input type="file" name="images[]" class="dropify" data-height="300" multiple/>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card px-3">
                <div class="card-body">
                  <h4 class="card-title">Galeria de Imagenes</h4>
                  <div id="lightgallery-without-thumb" class="row lightGallery">

                    @foreach ($product->images as $image)
                        <a href="{{ $image->url }}" class="image-tile"><img src="{{ $image->url }}" alt="image small"></a>                        
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>

        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
        <a href="{{ route('products.index') }}" class="btn btn-light">Cancelar</a>

    {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
    <script src="melody/js/dropzone.js"></script>
    <script src="melody/js/dropify.js"></script>
    {!! Html::script('melody/vendors/lightgallery/js/lightgallery-all.min.js') !!}
    {!! Html::script('select2/dist/js/select2.min.js') !!}
    {!! Html::script('ckeditor/ckeditor.js') !!}
    {!! Html::script('melody/js/light-gallery.js') !!}
    {{-- {!! Html::script('melody/js/jquery-file-upload.js') !!} --}}

    <script>
        CKEDITOR.replace('long_description');
    </script>

<script>
    (function($) {
    'use strict';
    if ($("#fileuploader").length) {
        $("#fileuploader").uploadFile({
        url: "/upload/product/{{$product->id}}/image",
        fileName: "image",
        });
    }
    })(jQuery);
</script>

    <script>
        $(document).ready(function() {
            $('#category').select2();
            $('#subcategory_id').select2();
            $('#provider_id').select2();
            $('#tags').select2();                        
        });
</script>

<script>
    var category = $('#category');
    var subcategory_id = $('#subcategory_id');

    category.change(function(){
        $.ajax({
            url: "{{ route('get_subcategories') }}",
            method: 'GET',
            data:{
                category: category.val(),
            },
            success: function(data){
                subcategory_id.empty();
                subcategory_id.append('<option disabled selected>-- Seleccione una Subcategoria --</option>');
                $.each(data, function(index, element){
                    subcategory_id.append('<option value="'+ element.id +'">'+ element.name +'</option>');
                })
            }
        })
    });
</script>
@endsection