@if(Auth::user()->type!='secre')
  @php
    header("Location: /appointments")
  @endphp
@endif
@extends('layout.master')
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
<h1 align="center">Ingrese Medio de Pago</h1>
<div class="card" style="text-align: center;width:80%; margin:0px auto;width: 64rem;">
  <div class="card-body">
  <form method="POST" style="text-align: center;width:80%; margin:0px auto;" action="/certificates">
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="medio_pago">Medio de Pago</label>
      <div class="col-md-6">
        <select id="medio_pago" class="form-control" name="medio_pago" required>
          <option value="" disabled selected>Seleccione un medio de pago</option>
          <option value="efectivo">Efectivo</option>
          <option value="tarjeta de credito">Tarjeta de Crédito</option>
          <option value="otros">Otros</option>
        </select>
      </div>
  </div>
    <input name="fecha" type="hidden" value="{{now()->toDateString()}}">
    <input name="appointment_id" type="hidden" value="{{$id_cita}}">
    <a class="btn btn-danger" role="main" href="/appointments">Regresar</a>
    <button type="submit" align="center"class="btn btn-primary">Ingresar</button>
  </form>
  </div>
</div>

@include('layout.errors')
@endsection
