@extends('layouts.admin')

@section('title', 'Registrar Compra')
    
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
                Registrar Compra
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Compras</a></li>
                    <li class="breadcrumb-item active">Registrar</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['route' => 'purchases.store', 'method' => 'POST']) !!}

                            @include('admin.purchase._form')

                            <button type="submit" id="btn_enviar" class="btn btn-primary mr-2">+ Registrar</button>
                            <a href="{{ route('purchases.index') }}" class="btn btn-light">Cancelar</a>

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

    function agregar() {
        product_id = $("#product_id").val();
        producto = $("#product_id option:selected").text();
        quantity = $("#quantity").val();
        price = $("#price").val();
        impuesto = $("#tax").val();
        if (product_id != "" && quantity != "" && quantity > 0 && price != "") {
            subtotal[cont] = quantity * price;
            total = total + subtotal[cont];
            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td><td><input type="hidden" id="price[]" name="price[]" value="' + price + '"> <input class="form-control" type="number" id="price[]" value="' + price + '" disabled></td><td><input type="hidden"  name="quantity[]" value="' + quantity + '"> <input class="form-control" type="number" value="' + quantity + '" disabled></td><td align="right">$ ' + subtotal[cont] + '</td></tr>';
            cont ++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        }else{
            alert('Error: Rellene los campo del detalle de la compra');
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