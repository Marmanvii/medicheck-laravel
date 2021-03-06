@if(Auth::user()->type!='admin')
  @php
    header("Location: /appointments")
  @endphp
@endif
@extends('layout.master')
<?php
  $encontrado = 0;
?>
@section('styles')
@endsection
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Seleccionar Médico</h1>
  <div class="card" style="text-align: center;width:80%; margin:0px auto;width: 64rem;">
    <div class="card-body">
  <form action="/schedules/create" method="GET" style="text-align: center;width:80%; margin:0px auto;"><!--Luego en el controlador, con request se obtiene este dato-->
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
  <div class="form-row">
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label>Médico</label>
        <select id="medics_id" class="form-control" name="medics_id" required>
          <option value="" disabled selected>Seleccione un médico</option>
          @foreach($medics as $medic) <!--Función de laravel, se busca por fila de la tabla, adquiriendo un medico y sus datos por ciclo, se obtiene desde el controlador, "as" sirve a modo de alias-->
            @foreach ($schedules as $schedule)
              @if ($medic->id == $schedule->medics_id) <!-- Se busca si el médico ya tiene un horario registrado, en tal caso no se puede agragr otro -->
                <?php
                  $encontrado = 1;
                ?>
              @endif
            @endforeach
            @if ($encontrado == '0') <!-- Si no se encuentra el médico se muetra para poder agregar el horario-->
              <option value="{{$medic->id}}">{{$medic->name}} {{$medic->last_name}}</option>
            @endif
            <?php
              $encontrado = 0; #Se vuelve a 0 la variable para proceder con el siguiente médico
            ?>
          @endforeach
        </select>
      </div>
    </div>
  </div>
    <a class="btn btn-danger" role="main" href="/appointments">Regresar</a>
    <button type="submit" align="center"class="btn btn-primary">Ingresar</button>
  </form>
</div></div>
@include('layout.errors')
@endsection
