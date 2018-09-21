@extends('layout.master')
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Seeccione área médica</h1>
  <h2 align="center">Seleccione el área de salud deseada</h2>
  <div class="card" style="text-align: center;width:80%; margin:0px auto;width: 64rem;">
    <div class="card-body">
  <form action="/appointments/select_fecha_medico" method="GET" style="text-align: center;width:80%; margin:0px auto;"><!--Luego en el controlador, con request se obtiene este dato-->
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
  <div class="form-row">
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="telefono">Médico</label>
        <select id="especialidad" class="form-control" name="especialidad" required>
          <option value="" disabled selected>Seleccione una especialidad</option>
          @foreach($medics as $medic) <!--Función de laravel, se busca por fila de la tabla, adquiriendo un medico y sus datos por ciclo, se obtiene desde el controlador, "as" sirve a modo de alias-->
              <option value="{{$medic->especialidad}}">{{$medic->especialidad}}</option>
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
