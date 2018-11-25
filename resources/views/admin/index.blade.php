@extends('layout.master')
@section('content')
<!--<a class="btn btn-danger" role="main" href="/register"zz>Agregar Médico</a> Botón oculto por el momento-->
<a class="btn btn-danger" role="main" href="/admin/select_area">Definir Horario Médico</a>
<a class="btn btn-danger" role="main" href="/admin/create_department">Agregar Departamento</a>
<a class="btn btn-danger" role="main" href="/users/select_type">Agregar Usuario Especial</a>

<!-- Botones para generar PDF -->
<a class="btn btn-danger" role="main" href="/report/users/view">PDF Usuarios</a> <!-- Botón para probar los PDF-->
<a class="btn btn-danger" role="main" href="/report/medics/select_area">PDF Ingresos Por Médico</a>
<a class="btn btn-danger" role="main" href="/report/hospital/select_fecha_inicio">Ingresos del Centro</a>

@endsection
