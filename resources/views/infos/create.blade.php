@extends('layout.master')
@section('styles')
@endsection
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Ingresar Nueva Noticia</h1>
  <div class="card" style="text-align: center;width:80%; margin:0px auto;width: 64rem;">
    <div class="card-body">
      <form method="POST" style="d-inline-flex p-2 justify-content-around" action="/news"  enctype="multipart/form-data">
      {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
        <div class="form-row align-items-center">

          <div class="col" align="center">
            <div class="form-group col-md-8">
              <label for="titulo"><b>Título de la Noticia</b></label>
              <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título de la Noticia..." value="{{ old('titulo') }}" required>
            </div>
          </div>

          <div class="col" align="center">
            <div class="form-group col-md-8">
              <label for="autor"><b>Nombre del Autor</b></label>
              <input type="text" class="form-control" id="autor" name="autor" placeholder="Nombre Apellido A." value="{{ old('autor') }}" required>
            </div>
          </div>

          <div class="col" align="center">
            <div class="form-group col-md-8">
              <label for="photo">
                <b>Foto</b>
              </label>
              <input type="file" name="foto" id="foto">
            </div>
          </div>

        </div>

        <div class="form-group">
          <label for="cuerpo"><b>Cuerpo de la Noticia</b></label>
          <textarea class="form-control" rows="5" id="cuerpo" name="cuerpo" value="{{ old('cuerpo') }}" required></textarea>
        </div>
        
        <a class="btn btn-danger" role="main" href="/news">Regresar</a>
        <button type="submit" align="center"class="btn btn-primary">Ingresar</button>
      </form>
    </div>
  </div>
@include('layout.errors')
@endsection