@extends('layout.master')

@section('content')
<center>
<div class="card d-inline-flex p-2 justify-content-around align-items-center" style="">
    <div class="card-body" align="center">
        <a class="btn" role="main" href="/news/create">Ingresar Noticia</a>
        <a class="btn" role="main" href="/news">Editar Noticia</a>
        <a class="btn" role="main" href="/news">Eliminar Noticia</a>
    </div>
  </div>
</center>
@endsection