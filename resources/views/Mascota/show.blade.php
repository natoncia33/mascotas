@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>
						{{ $error }}
					</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
			
			<div class="panel-heading">
					<h3 class="panel-title"> Mascota</h3>
			</div>	            
                <form method="POST" action="{{ route('mascota.show',$mascota->id) }}"  role="form">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PATCH">
				<div class="row">
					<div class="form-group">
						<table class="table center">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Edad</th>
									<th>Especie</th>
									<th>Clasificación</th>
									<th>Peso</th>
									<th>Pais origen</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$mascota->nombre}}</td>
									<td>{{$mascota->edad}}</td>
									<td>{{$mascota->especie}}</td>
									<td>{{$mascota->clasificacion}}</td>
									<td>{{$mascota->peso}}</td>
									<td>{{$mascota->paisorigen}}</td>
								</tr>
							</tbody>
						</table>

						<div class="col-xs-2 col-sm-2 col-md-2">
							<a href="{{ route('mascota.index') }}" class="btn btn-info btn-block" >Atrás</a>
						</div>
					</div>
				</div>
					
			</form>
		</div>
	</section>
</div>
@endsection