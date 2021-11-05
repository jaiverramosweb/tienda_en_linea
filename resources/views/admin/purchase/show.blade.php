@extends('layouts/admin')

@section('title', 'Detalles de Compra')

@section('style')
@endsection

@section('content')

	<div class="content-wrapper">
	  <div class="page-header">
		    <h3 class="page-title">
		      Detalles de Compra
		    </h3>
		    <nav aria-label="breadcrumb">
		  	<ol class="breadcrumb">
		  		<li class="breadcrumb-item"><a href="#">Panel| Administrador</a></li>
		  		<li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Compra</a></li>
		  		<li class="breadcrumb-item active" aria-current="page">Detalles de Compra</li>
		  	</ol>
		  </nav>
	  </div>
	  	  <div class="row">

	   <div class="col-md-12 grid-margin stretch-card">
	      <div class="card">
	        <div class="card-body">
	        	<div class="row">

						<div class="col-md-6 text-center">
							<label for="nombre" class="form-control-label">Proveedor</label>
							<p>{{ $purchase->provider->name }}</p>
						</div>
						<div class="col-md-6 text-center">
							<label for="nombre" class="form-control-label">Numero Compra</label>
							<p>{{ $purchase->id }}</p>
						</div>

					<br><br>

					<div class="col-md-12">
						<h4 class="card-title ml-3 text-center">Detalles de compras</h4>
						<div class="table-responsive col-md-12">
							<table id="detalles" class="table">
								<thead>
									<tr>
										<th>Producto</th>
										<th>Precio</th>
										<th>Cantidad</th>
										<th>SubTotal</th>
									</tr>
								</thead>
								<tfoot>

									<tr>
										<th colspan="3">
											<p align="right">SUBTOTAL:</p>
										</th>
										<th>
											<p align="right">$ {{ number_format($subtotal,2) }}</p>
										</th>
									</tr>

									<tr>
										<th colspan="3">
											<p align="right">TOTAL IMPUESTO {{ $purchase->tax}}%:</p>
										</th>
										<th>
											<p align="right">$ {{number_format($subtotal * $purchase->tax/100,2)}}</p>
										</th>
									</tr>

									<tr>
										<th colspan="3">
											<p align="right">TOTAL:</p>
										</th>
										<th>
											<p align="right">$ {{number_format($purchase->total,2)}}</p>
										</th>
									</tr>

								</tfoot>
								<tbody>
									@foreach($purchaseDetails as $purchaseDetail)
										<tr>
											<td>{{ $purchaseDetail->product->name }}</td>
											<td>$ {{ $purchaseDetail->price }}</td>
											<td>{{ $purchaseDetail->quantity }}</td>
											<td>$ {{ number_format($purchaseDetail->quantity * $purchaseDetail->price,2) }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>



	        	</div>
	        </div>

	        <div class="card-footer text-muted">
	        	<a href="{{ route('purchases.index') }}" class="btn btn-info float-right">Regresar</a>
	        </div>

	      </div>
	    </div>

	  </div>
@endsection

@section('script')
@endsection