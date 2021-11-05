<div class="row">
	<div class="col-md-6">
		<div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="" required autofocus>
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
						@foreach ($permissions as $permission)
							<li>
								<label>
									{!! Form::checkbox('permissions[]', $permission->id, null) !!}
									{{ $permission->name }}
								</label>
							</li>
						@endforeach
					</ul>

			</div>
		</div>
	</div>
</div>
