@extends('layout.master')
@section('styles')
@endsection
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Registrar cita</h1>
  <div class="card" style="text-align: center;width:80%; margin:0px auto;width: 64rem;">
    <div class="card-body">
  <form method="POST" style="text-align: center;width:80%; margin:0px auto;" action="/appointments">
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
  <div class="form-row">
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="telefono">Teléfono</label>
        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="91213420" value="{{ old('telefono') }}" required>
      </div>
      <div class="form-group col-md-8">
        <label for="telefono">Médico</label>
        <select id="medics_id" class="form-control" name="medics_id" required>
          <option value="" disabled selected>Seleccione un médico...</option>
          @foreach($users as $medic) <!--Función de laravel, se busca por fila de la tabla, adquiriendo un medico y sus datos por ciclo, se obtiene desde el controlador, "as" sirve a modo de alias-->
            @if($medic->type=='medic')
              <option value="{{$medic->id}}">{{$medic->name}} {{$medic->last_name}}: {{$medic->especialidad}}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-8">
        <label for="bloque">Bloque</label>
        <select id="bloque" class="form-control" name="bloque" required>
          <option value="1">8:30 - 9:00</option>
          <option value="2">9:00 - 9:30</option>
          <option value="3">9:30 - 10:00</option>
          <option value="4">10:00 - 10:30</option>
          <option value="5">10:30 - 11:00</option>
          <option value="6">11:00 - 11:30</option>
          <option value="7">11:30 - 12:00</option>
          <option value="8">12:00 - 12:30</option>
          <option value="9">12:30 - 13:00</option>
          <option value="10">15:00 - 15:30</option>
          <option value="11">15:30 - 16:00</option>
          <option value="12">16:00 - 16:30</option>
          <option value="13">16:30 - 17:00</option>
        </select>
      </div>
    </div>
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="descripcion">Observación</label>
        <input type="textarea" class="form-control" id="observacion" name="observacion"  value="{{ old('observacion') }}" required>
      </div>
      <div class="form-group col-md-8">
        <label for="telefono">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" min="<?php echo date('Y-m-d');?>" required>
      </div>
    </div>
  </div>
    <input name="patient_id" type="hidden" value="{{old (Auth::id(), Auth::id())}}">
    <button type="submit" align="center"class="btn">Ingresar</button>
    <a class="btn btn-danger" role="main" href="/appointments">Regresar</a>
  </form>
</div></div>
@include('layout.errors')
@endsection
