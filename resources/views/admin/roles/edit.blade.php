@extends('layouts.admin')

@section('title', 'Editar Rol')
    
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
                Editar Rol
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Rol</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'PUT']) !!}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required autofocus>
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Permisos especiales</h5>
                                        <label>
                                            {!! Form::checkbox('special', 'all-access', null) !!}
                                            Acceso total
                                        </label>
                                        <label>
                                            {!! Form::checkbox('special', 'no-access', null) !!}
                                            Ningun acceso
                                        </label>
                                    </div>
                            
                                    <div class="form-group">
                                        <h5>Lista de permisos</h5>
                                        <div class="form-group col-12">
                            
                                                <ul class="list-unstyled">
                                                    @foreach ($permissions as $id => $permission)
                                                        <li>
                                                            <label class="form-check-lable">
                                                                <input class="form-check-input" type="checkbox" name="permissions[]" 
                                                                    value="{{ $id }}" {{ $role->permissions->contains($id) ? 'checked' : '' }}>
                                                                <span class="form-check-sign">
                                                                    <span class="check" value="">{{ $permission }}</span>
                                                                </span>

                                                             <label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    
@endsection