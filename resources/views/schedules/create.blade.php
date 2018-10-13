@extends('layout.master')
@section('styles')
@endsection
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Días de Atención</h1>
  <h5 align="center">Mañana: 08:00 - 13:00</h5>
  <h5 align="center">Tarde:  14:00 - 19:00</h5>
  <div class="card" style="text-align: center;width:80%; margin:0px auto;width: 64rem;">
    <div class="card-body">
  <form method="POST" style="text-align: center;width:80%; margin:0px auto;" action="/schedules">
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
    <div class="col" align="center">
      <div class="form-group row">
        <div class="col">
          <label>Lunes</label>
            <div class="col-sm-10">
            <select id="lunes" class="form-control" name="lunes" required>
              <option value="" disabled selected>Seleccione Horario de Atención</option>
              <option value="0">Sin Atención</option>
              <option value="1">Solo Mañana</option>
              <option value="2">Solo Tarde</option>
              <option value="3">Mañana y Tarde</option>
            </select>
          </div>
        </div>
        <div class="col">
          <label>Martes</label>
            <div class="col-sm-10">
            <select id="martes" class="form-control" name="martes" required>
              <option value="" disabled selected>Seleccione Horario de Atención</option>
              <option value="0">Sin Atención</option>
              <option value="1">Solo Mañana</option>
              <option value="2">Solo Tarde</option>
              <option value="3">Mañana y Tarde</option>
            </select>
          </div>
        </div>
      </div>
    <div class="form-group row">
      <div class="col">
        <label>Miércoles</label>
          <div class="col-sm-10">
          <select id="miercoles" class="form-control" name="miercoles" required>
            <option value="" disabled selected>Seleccione Horario de Atención</option>
            <option value="0">Sin Atención</option>
            <option value="1">Solo Mañana</option>
            <option value="2">Solo Tarde</option>
            <option value="3">Mañana y Tarde</option>
          </select>
        </div>
      </div>
      <div class="col">
        <label>Jueves</label>
          <div class="col-sm-10">
            <select id="jueves" class="form-control" name="jueves" required>
              <option value="" disabled selected>Seleccione Horario de Atención</option>
              <option value="0">Sin Atención</option>
              <option value="1">Solo Mañana</option>
              <option value="2">Solo Tarde</option>
              <option value="3">Mañana y Tarde</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col">
          <label>Viernes</label>
            <div class="col-sm-10">
            <select id="viernes" class="form-control" name="viernes" required>
              <option value="" disabled selected>Seleccione Horario de Atención</option>
              <option value="0">Sin Atención</option>
              <option value="1">Solo Mañana</option>
              <option value="2">Solo Tarde</option>
              <option value="3">Mañana y Tarde</option>
            </select>
          </div>
        </div>
        <div class="col">
          <label>Duración de la Consulta</label>
            <div class="col-sm-10">
              <select id="duracion" class="form-control" name="duracion" required>
                <option value="" disabled selected>Seleccione Duración</option>
                <option value="15">15 Minutos</option>
                <option value="20">20 Minutos</option>
                <option value="30">30 Minutos</option>
              </select>
            </div>
          </div>
        </div>
    </div>
    <input name="medics_id" type="hidden" value="{{ old( 'medics_id', $medico) }}">
    <a class="btn btn-danger" role="main" href="/appointments">Regresar</a>
    <button type="submit" align="center"class="btn btn-primary">Ingresar</button>
  </form>
</div></div>
@include('layout.errors')
@endsection
