@extends('layouts.admin')

@section('title', 'Gestion de Compras')
    
@section('create')
{{-- <li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{ route('purchases.create') }}">
        <span class="btn btn-primary">+ Crear Compra</span>
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
                Gestion de Compras
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item active">Compra</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Compras</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('purchases.create') }}" class="dropdown-item">Registrar</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <th scope="row">{{ $purchase->id }}</th>
                                            <td>
                                                {{ date('d-m-Y', strtotime($purchase->purchase_date)) }}
                                            </td>
                                            <td>{{ $purchase->total }}</td>
                                            <td>
                                                @if ($purchase->status == 'VALID' )
                                                <a href="{{ route('purchases.change.status', $purchase) }}" class="jsgrid-button btn btn-sm btn-success" title="Activo">
                                                        Validado <i class="fas fa-check"></i>
                                                </a>
                                                @else
                                                <a href="{{ route('purchases.change.status', $purchase) }}" class="jsgrid-button btn btn-sm btn-danger" title="Desactivado">
                                                        Desactivado <i class="fas fa-times"></i>
                                                </a>
	          						@endif
                                            </td>
                                            <td>
                                                {{-- {!! Form::open(['route' => ['purchases.destroy',$purchase], 'method' => 'DELETE']) !!}

                                                    <a href="{{ route('purchases.edit', $purchase) }}" title="Editar" class="jsgrid-button jsgrid-edit-button">
                                                        <i class="far fa-edit"></i>
                                                    </a>

                                                    <button type="submit" title="Eliminar" class="jsgrid-button jsgrid-edit-button unstyled-button">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>

                                                {!! Form::close() !!} --}}

                                                <a href="{{ route('purchases.show', $purchase) }}" class="jsgrid-button" title="ver"><i class="far fa-eye"></i></a>
                                                <a href="{{ route('purchases.pdf', $purchase) }}" class="jsgrid-button" title="pdf"><i class="far fa-file-pdf"></i></a>
		          						        <a href="#" class="jsgrid-button" title="imprimir"><i class="fas fa-print"></i></a>
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