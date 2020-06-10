@extends('layouts.app')


@section('content')

	</style>
	<center>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="well well-sm">
						<form class="form-horizontal" method="post">
							<fieldset>
								<legend class="text-center header">Deja tu mensaje y responderemos a la brevedad</legend>

								<div class="form-group">
									<span class="col-md-1 col-md-offset-2 text-center"><i></i></span>
									<div class="col-md-8">
										<input id="Telefono" name="Telefono" type="text" placeholder="Telefono" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<span class="col-md-1 col-md-offset-2 text-center"><i></i></span>
									<div class="col-md-8">
										<textarea class="form-control" id="descripcion" name="descripcion" placeholder="Detalle sus inconvenientes y el equipo de soporte se pondra en contacto con usted." rows="7"></textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 text-center">
										<button type="submit" class="btn btn-primary btn-lg" style="padding: 8px 10px 7px 10px; font-size:20px">Enviar</button>
										<a href="{{url('home')}}" class="btn btn-danger" style="padding: 6px 10px 6px 10px; font-size:20px">Regresar</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>

	</center>

@endsection