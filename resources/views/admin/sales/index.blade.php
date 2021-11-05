@extends('layouts/admin')
@section('title', 'Gestion de ventas')
@section('style')
	<style type="text/css">
		.unstyled-button {
			border: none;
			padding: 0;
			background: none;
			cursor: pointer;
		}
	</style>
@endsection

@section('content')

	<div class="content-wrapper">
	  <div class="page-header">
		    <h3 class="page-title">
		      Ventas
		    </h3>
		    <nav aria-label="breadcrumb">
		  	<ol class="breadcrumb">
		  		<li class="breadcrumb-item"><a href="#">Panel| Administrador</a></li>
		  		<li class="breadcrumb-item active" aria-current="page">Ventas</li>
		  	</ol>
		  </nav>
	  </div>
	  	  <div class="row">
	    <div class="col-md-12 grid-margin stretch-card">
	      <div class="card">
	        <div class="card-body">
				<div class="d-flex justify-content-between">
					<h4 class="card-title">Ventas</h4>

					<div class="btn-group">
						  <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <i class="fas fa-ellipsis-v"></i>
						  </a>
						  <div class="dropdown-menu dropdown-menu-right">
						    <a href="{{ route('sales.create') }}" class="dropdown-item">+ Registrar</a>
						    <!--  <button class="dropdown-item" type="button">Another action</button>
						    <button class="dropdown-item" type="button">Something else here</button> -->
						  </div>
					</div>

				</div>


	          <div class="table-responsive">
	          	<table id="order-listing" class="table">

	          		<thead>
	          			<tr>
	          				<th>ID</th>
	          				<th>Fecha</th>
	          				<th>Total</th>
	          				<th>Estado</th>
	          				<th style="width: 100px;"></th>
	          			</tr>
	          		</thead>

	          		<tbody>
	          			@foreach($sales as $sale)
	          				<tr>
	          					<th scope="row">{{ $sale->id }}</th>

	          					<td>
									{{ date('d-m-Y', strtotime($sale->sale_date)) }}
	          					</td>

	          					<td>
	          						{{ $sale->total }}
	          					</td>
	          					<td>
	          						@if ($sale->status == 'VALID' )
	          						<a href="{{ route('sales.change.status', $sale) }}" class="jsgrid-button btn btn-sm btn-success" title="Activo">
		          							Validado <i class="fas fa-check"></i>
		          					</a>
	          						@else
	          						<a href="{{ route('sales.change.status', $sale) }}" class="jsgrid-button btn btn-sm btn-danger" title="Desactivado">
		          							Desactivado <i class="fas fa-times"></i>
		          					</a>
	          						@endif
	          					</td>

	          					<td style="width: 100px;">
	          						{!! Form::open(['route' =>['sales.destroy', $sale], 'method' => 'DELETE']) !!}

		          					<!--	<a href="" class="jsgrid-button jsgrid-edit-button" title="Editar">
		          							<i class="far fa-edit"></i>
		          						</a> -->

		          						<a href="{{ route('sales.show', $sale) }}" class="jsgrid-button" title="ver"><i class="far fa-eye"></i></a>
		          						<a href="#" class="jsgrid-button" title="pdf"><i class="far fa-file-pdf"></i></a>
		          						<a href="#" class="jsgrid-button" title="imprimir"><i class="fas fa-print"></i></a>

		          					<!--	<button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
		          							<i class="far fa-trash-alt"></i>
		          						</button> -->

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
@endsection

@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection