@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Mascotas</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('mascota.create') }}" class="btn btn-info" >Añadir Mascota</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Especie</th>
               
               <th>Detalle</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($mascotas->count())  
              @foreach($mascotas as $mascota)  
              <tr>
                <td>{{$mascota->nombre}}</td>
                <td>{{$mascota->especie}}</td>
                <td> 
                    <a href="{{action('MascotaController@show', $mascota->id)}}" >
                      <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                </td>

                <td>
                    <a href="{{action('MascotaController@edit', $mascota->id)}}" >
                    <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
                <td>
                  <form action="{{action('MascotaController@destroy', $mascota->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit">
                   <span class="glyphicon glyphicon-remove"></span>
                   </button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $mascotas->links() }}
    </div>
  </div>
</section>

@endsection