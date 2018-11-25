@extends('layout.master')
@section('content')
  <h2 class="text-center">Prescripción Médica</h2>
  <table class="table table-striped table-bordered table-hover" style="width:80%; margin:0px auto;">
    <<thead class="thead-dark">>
      <tr>
        <th scope="col">Nombre Medicamento</th>
        <th scope="col">Intervalo</th>
        <th scope="col">Duración</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($medications as $medication)
        @if($medication->appointment_id == $id_cita)
          <tr>
            <td>{{$medication->nombre}}</td>
            <td>{{$medication->intervalo}}</td>
            <td>{{$medication->duracion}}</td>
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>

  <br></br>
    <main role="main" class="inner cover text-center">
        <form action="/prescription/download" method="POST">
          {{csrf_field()}}
          <input name="appointment_id" type="hidden" value="{{$id_cita}}">
          <input name="patient_id" type="hidden" value="{{$id_user}}">
        <button class="btn btn-primary" type="submit">Descargar PDF</button>
        </form>
        <h3></h3>
        <a href="/appointments" class="btn btn-danger">Volver</a>
    </main>

@endsection
