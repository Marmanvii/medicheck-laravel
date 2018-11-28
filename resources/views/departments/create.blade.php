@if(Auth::user()->type!='admin')
  @php
    header("Location: /appointments")
  @endphp
@endif
@extends('layout.master')
@section('styles')
@endsection
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Registro de Departamento</h1>
  <form method="POST" style="text-align: center;width:80%; margin:0px auto;" action="/departments">
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
  <div class="form-row">
    <div class="col" align="center">
      <div class="form-group col-md-8">
        <label for="department">Departamento</label>
        <input type="textarea" class="form-control" id="department" name="department" required>
      </div>
      <button type="submit" align="center" class="btn btn-primary">Ingresar</button>
  </div>
  </form>
@include('layout.errors')
@endsection
