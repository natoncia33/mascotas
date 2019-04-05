@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error !!</strong> Todos los campos son requeridos.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nueva Mascota</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
                    
						<form method="POST" action="{{ route('mascota.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre de la mascota">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
										<input type="text" name="edad" id="edad" class="form-control input-sm" placeholder="Edad de la mascota">
									</div>
								</div>
							</div>

                            <div class="row">
                            
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="especie" id="especie" class="form-control input-sm" placeholder="especie de la mascota">
									</div>
								</div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="clasificacion" id="clasificacion" class="form-control input-sm" placeholder="clasificacion de la mascota">

									</div>
								</div>

							</div>

							<div class="row">
						
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="peso" id="peso" class="form-control input-sm" placeholder="peso de la mascota">
									</div>
								</div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="paisorigen" id="paisorigen" class="form-control input-sm" placeholder="pais origen de la mascota">
									</div>
								</div>

							</div>
						
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection