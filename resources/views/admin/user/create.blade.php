@extends('layouts.admin')

@section('title', 'Registrar Usuario')
    
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
                Crear Usuario
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuario</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

                           <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email">Correo Electronico</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                               </div>

                               	<div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Lista de permisos</h5>
                                        <div class="form-group col-12">

                                                <ul class="list-unstyled">
                                                    @foreach ($roles as $rol)
                                                        <li>
                                                            <label>
                                                                {!! Form::checkbox('roles[]', $rol->id, null) !!}
                                                                {{ $rol->name }}
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                        </div>
                                    </div>
                                </div>

                           </div>

                            <button type="submit" class="btn btn-primary mr-2">+ Crear</button>
                            <a href="{{ route('users.index') }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    
@endsection