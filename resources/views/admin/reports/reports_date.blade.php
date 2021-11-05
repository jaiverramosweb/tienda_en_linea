@extends('layouts/admin')
@section('title', 'Reporte de ventas por fecha')
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
		      Reporte de ventas por fecha
		    </h3>
		    <nav aria-label="breadcrumb">
		  	<ol class="breadcrumb">
		  		<li class="breadcrumb-item"><a href="#">Panel| Administrador</a></li>
		  		<li class="breadcrumb-item active" aria-current="page">Reporte de ventas por fecha</li>
		  	</ol>
		  </nav>
	  </div>
	  	  <div class="row">
	    <div class="col-md-12 grid-margin stretch-card">
	      <div class="card">
	        <div class="card-body">
	        	{!! Form::open(['route' => 'reports.result', 'method' => 'POST']) !!}
				<div class="row">
						<div class="col-12 col-md-3">
							<span>Fecha Inicio</span>
							<div class="form-group">
								<input type="date" class="form-control" value="{{ old('fecha_ini') }}" name="fecha_ini" id="fecha_ini">
							</div>
						</div>
						<div class="col-12 col-md-3">
							<span>Fecha Fin</span>
							<div class="form-group">
								<input type="date" class="form-control" value="{{ old('fecha_fin') }}" name="fecha_fin" id="fecha_fin">
							</div>
						</div>
						<div class="col-12 col-md-3 text-center mt-4">
							<div class="form-group">
								<button type="submit" class="btn btn-sm btm-primary">Consultar</button>
							</div>
						</div>
					{!! Form::close() !!}

					<div class="col-12 col-md-3 text-center">
						<span>Todal de ingreso: <b> </b></span>
						<div class="form-group">
							<strong>$ {{ $total }}</strong>
						</div>
					</div>
				</div>


	          <div class="table-responsive">
	          	<table id="order-listing" class="table">

	          		<thead>
	          			<tr>
	          				<th>ID</th>
	          				<th>FECHA</th>
	          				<th>TOTAL</th>
	          				<th>ESTADO</th>
	          				<th>ACCIONES</th>
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
	          						{{ $sale->status }}
	          					</td>
	          					<td style="width: 50px;">
									<a href="{{ route('sales.show', $sale) }}" class="jsgrid-button" title="ver"><i class="far fa-eye"></i></a>
									<a href="#" class="jsgrid-button" title="pdf"><i class="far fa-file-pdf"></i></a>
									<a href="#" class="jsgrid-button" title="imprimir"><i class="fas fa-print"></i></a>
	          					</td>
	          				</tr>
	          			@endforeach
	          		</tbody>

	          	</table>
	          </div>
	        </div>
	        <div class="card-footer text-muted">

	        </div>
	      </div>
	    </div>

	  </div>

@endsection

@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection