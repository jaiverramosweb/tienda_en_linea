<div class="row">
    <div class="form-group  col-12 col-md-6">
        <label for="provider_id">Proveedor</label>
        <select class="form-control" name="provider_id" id="provider_id">
          <option>== Seleccione el Proveedor ==</option>
          @foreach ($providers as $purchase)
              <option value="{{ $purchase->id }}">{{ $purchase->name }}</option>        
          @endforeach
        </select>
    </div>
      
    <div class="form-group  col-12 col-md-6">
        <label for="tax">Impuesto</label>
        <input type="number" name="tax" id="tax" class="form-control">
    </div>
      
    <div class="form-group  col-12 col-md-6">
        <label for="product_id">Producto</label>
        <select class="form-control" name="product_id" id="product_id">
          <option>== Seleccione el Proveedor ==</option>
          @foreach ($products as $product)
              <option value="{{ $product->id }}">{{ $product->name }}</option>        
          @endforeach
        </select>
    </div>
      
    <div class="form-group  col-12 col-md-6">
        <label for="quantity">Cantidad</label>
        <input type="number" name="quantity" id="quantity" class="form-control">
    </div>
      
    <div class="form-group  col-12 col-md-6">
        <label for="price">Precio</label>
        <input type="number" name="price" id="price" class="form-control">
    </div>

    <div class="form-group col-12 col-md-6">
		<button type="button" id="agregar" class="btn btn-dark btn-block mt-4">+ Agregar producto</button>
	</div>
</div>

<hr>
<hr>

<div class="form-group" id="tabla_detalles">
    <h4 class="card-title">Detalle de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">

            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">$ 0.00</span></p>
                    </th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">$ 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">$ 0.00</span>
                            <input type="hidden" name="total" id="total_pagar">
                        </p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>