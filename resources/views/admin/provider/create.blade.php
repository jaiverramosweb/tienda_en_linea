@extends('layouts.admin')

@section('title', 'Registrar Proveedor')
    
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
                Crear Proveedor
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Proveedor</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['route' => 'providers.store', 'method' => 'POST']) !!}

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="" required>
                            </div>

                            <div class="form-group">
                                <label for="ruc">Ruc</label>
                                <input type="text" name="ruc" id="ruc" class="form-control" placeholder="" required>
                            </div>

                            <div class="form-group">
                                <label for="addres">Dirección</label>
                                <input type="text" name="addres" id="addres" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="photo">Telefono</label>
                                <input type="text" name="photo" id="photo" class="form-control" placeholder="">
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">+ Crear</button>
                            <a href="{{ route('providers.index') }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    
@endsection