@extends('layout.master')
@section('content')
  <h2 class="text-center">Historial</h2>
  <div class="card-columns" style="width:80%; margin:0px auto;">
    @foreach ($appointments as $appointment)
      @if($appointment->patient_id == $patient)
        @foreach ($files as $file)
          @if($file->appointment_id == $appointment->id)
            <div class="card text-center">
              <div class="card-body">
                <h4 class="card-title" card text>{{$file->diagnostico}}</h4>
                <h5 class="card-subtitle" card text>{{$file->tratamiento}}</h5>
                <h6 class="card-text" card text>{{$file->descripcion}}</h6>
                <h6 class="card-text" card text>{{$appointment->fecha}}</h6>
                <table class="table table-sm" style="width:80%; margin:0px auto;">
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Intervalo</th>
                      <th scope="col">Duración</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($medications as $medication)
                      @if($medication->appointment_id == $appointment->id)
                        <tr>
                          <td>{{$medication->nombre}}</td>
                          <td>{{$medication->intervalo}}</td>
                          <td>{{$medication->duracion}}</td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
                <p class="card-text"><small class="text-muted">MediCheck</small></p>
              </div>
            </div>
          @endif
        @endforeach
      @endif
    @endforeach
  </div>
  <main role="main" class="inner cover text-center">
    <h3></h3>
    <p class="lead">
      <a href="/medic_day" class="btn btn-lg btn-secondary">Volver</a>
    </p>
  </main>
@endsection
