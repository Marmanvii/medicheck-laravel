@extends('layout.master')
@section('styles')
@endsection
@section('content') <!--Se define como seccion para ser incluido en la seccion contenido en el layout principal-->
  <h1 align="center">Registrar nuevo usuario</h1>
  <div class="card" style="text-align: center;width:80%; margin:0px auto;width: 64rem;">
  <div class="card-body">
  <form method="POST" style="text-align: center;width:80%; margin:0px auto;" action="/users">
  {{ csrf_field() }} <!--Sirve para evitar ataques modificando el html desde el navegador.-->
  <div class="form-row">
    <div class="col" align="center">
      <div class="form-group col-md-15">
        <label for="rut">RUT</label>
        <input type="text" class="form-control" id="rut" name="rut" placeholder="11.111.111-1" value="{{ old('rut') }}" required>
      </div>
    </div>
    <div class="col" align="center">
      <div class="form-group col-md-15">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombres" value="{{ old('name') }}" required>
      </div>
    </div>
    <div class="col" align="center">
      <div class="form-group col-md-15">
        <label for="last_name">Apellidos</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos" value="{{ old('last_name') }}" required>
      </div>
    </div>
    <div class="col" align="center">
      <div class="form-group col-md-15">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password"  value="{{ old('password') }}" required>
      </div>
    </div>
    <div class="col" align="center">
      <div class="form-group col-md-15">
        <label for="email">E-mail</label>
        <input type="textarea" class="form-control" id="email" name="email"  value="{{ old('email') }}" required>
      </div>
    </div>
    @if ($type == 'medic')
      <select id="department_id" class="form-control" name="department_id" required>
        <option value="" disabled selected>Seleccione un departamento</option>
      @foreach ($departments as $department)
        <option value="{{$department->id}}">{{$department->department}}</option>
      @endforeach
      </select>
      <div class="col" align="center">
        <div class="form-group col-md-15">
          <label for="valor">Valor</label>
          <input type="integer" class="form-control" id="valor" name="valor"  value="{{ old('valor') }}" required>
        </div>
      </div>
    @endif
  </div>
  @if ($type == 'secre')
    <input name="valor" type="hidden" value="0">
  @endif
    <input name="type" type="hidden" value="{{$type}}">
    <a class="btn btn-danger" role="main" href="/users/select_type">Regresar</a>
    <button type="submit" align="center"class="btn btn-primary">Ingresar</button>
  </form>
</div></div>
@include('layout.errors')
@endsection
