@extends('layouts.admin')
@section('title', 'Vista del proveedor')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Información del Proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Proveedor</a></li>
                <li class="breadcrumb-item active">Información</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center-pb-4">
                                <h3>Nombre del provedor</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        Sobre Proveedor
                                    </button>
                                    <button type="button" class="list-group-item list-group-item-action">Proveedir</buttom>
                                    <button type="button" class="list-group-item list-group-item-action">Registrar proveeodr</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
    
@endsection