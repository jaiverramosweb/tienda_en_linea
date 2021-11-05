@extends('layouts.admin')

@section('title', 'Registrar Venta')
    
@section('create')
{{-- <li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{ route('saless.create') }}">
        <span class="btn btn-primary">+ Crear Venta</span>
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
                Registrar Venta
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                    <li class="breadcrumb-item active">Registrar</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['route' => 'sales.store', 'method' => 'POST']) !!}

                            @include('admin.sales._form')

                            <button type="submit" id="btn_enviar" class="btn btn-primary mr-2">+ Registrar</button>
                            <a href="{{ route('sales.index') }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $("#agregar").click(function () {
            agregar();
        });
    });

    var cont = 0;
    total = 0;
    subtotal = [];

    $("#tabla_detalles").hide();
    $("#btn_enviar").hide();
	$("#product_id").change(mostrarValores);

	function mostrarValores() {
		datosProducto = document.getElementById('product_id').value.split('_');
		$("#price").val(datosProducto[2]);
		$("#stock").val(datosProducto[1]);
	}

    function agregar() {
        datosProducto = document.getElementById('product_id').value.split('_');
        product_id = datosProducto[0];
        
        producto = $("#product_id option:selected").text();
        quantity = $("#quantity").val();
        discount = $("#discount").val();
        price = $("#price").val();
        stock = $("#stock").val();
        impuesto = $("#tax").val();
        if (product_id != "" && quantity != "" && price != "" && stock != "" && impuesto != "") {
            if (parseInt(stock) >= parseInt(quantity)) {
                subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td><td><input type="hidden" name="price[]" value="' + parseFloat(price).toFixed(2) + '"> <input class="form-control" type="number"  value="' + parseFloat(price).toFixed(2) + '" disabled></td><td><input type="hidden" name="discount[]" value="' + parseFloat(discount) + '"> <input class="form-control" type="number" value="' + parseFloat(discount) + '" disabled></td><td><input type="hidden"  name="quantity[]" value="' + quantity + '"> <input class="form-control" type="number" value="' + quantity + '" disabled></td><td align="right">$ ' + parseFloat(subtotal[cont].toFixed(2)) + '</td></tr>';
                cont ++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                alert('Error: La cantidad supera el stop actual');
            }
        } else {
            alert('Error: Debe rellenar todos los campos');
        }
    }

    function limpiar() {
        $("#quantity").val("");
        $("#price").val("");
    }

    function totales() {
        $("#total").html("$ " + total.toFixed(2));
        total_impuesto = total * impuesto /100;
        total_pagar = total + total_impuesto;
        $("#total_impuesto").html("$ " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("$ " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
    }
    
    function evaluar() {
        if (total > 0) {
            $("#tabla_detalles").show();
            $("#btn_enviar").show();
        }else{
            $("#tabla_detalles").hide();
            $("#btn_enviar").hide();
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        total_impuesto = total * impuesto /100;
        total_pagar_html = total + total_impuesto;
        $("#total").html("$" + total);
        $("#total_impuesto").html("$ " + total_impuesto);
        $("#total_pagar_html").html("$ " + total_pagar_html);
        $("#total").val(total_pagar_html.toFixed(2));
        $("#fila" + index).remove();
        evaluar();
    }
</script>
@endsection