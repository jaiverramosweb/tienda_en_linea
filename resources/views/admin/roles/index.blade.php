@extends('layouts.admin')

@section('title', 'Gestion de Roles')
    
@section('create')
{{-- <li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{ route('categories.create') }}">
        <span class="btn btn-primary">+ Crear Categoria</span>
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
                Gestion de Roles
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item active">Roles</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Roles</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('roles.create') }}" class="dropdown-item">Agregar</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Guard</th>
                                        <th>Permisos</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <th scope="row">{{ $role->id }}</th>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->guard_name }}</td>
                                            <td>
                                                @forelse ($role->permissions as $permission)
                                                    <span class="badge badge-info">{{ $permission->name }}</span>
                                                @empty
                                                    <span class="badge badge-danger">Sin permisos asignados</span>
                                                @endforelse
                                            </td>
                                            <td>
                                                {!! Form::open(['route' => ['roles.destroy',$role], 'method' => 'DELETE']) !!}

                                                    <a href="{{ route('roles.edit', $role) }}" title="Editar" class="jsgrid-button jsgrid-edit-button">
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