@extends('layout.master')
<?php
$i = 1;
?>
@section('content')
  <h2 class="text-center">Médicos</h2>
  <div class="card-columns" style="width:80%; margin:0px auto;">
    @foreach ($users as $user)
      @if($user->type == 'medic')
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title" card text>{{$user->name}} {{$user->last_name}}</h4>
            <h6 class="card-subtitle" card text>{{$user->especialidad}} - ${{$user->valor}}</h6>
            @foreach ($schedules as $schedule)
              @if($schedule->medics_id == $user->id)
                <h6 class="card-text">Duración: {{$schedule->duracion}} Minutos</h6>
              @endif
              <table class="table table-sm" style="width:80%; margin:0px auto;">
                <thead>
                  <tr>
                    <th scope="col">Días de Atención</th>
                  </tr>
                </thead>
                <tbody>
                  @if($schedule->medics_id == $user->id)
                    <tr>
                      <td>
                        @if ($schedule->lunes == '0')
                          Lunes: No atiende
                        @elseif ($schedule->lunes == '1')
                          Lunes: Mañana
                        @elseif ($schedule->lunes == '2')
                          Lunes: Tarde
                        @elseif ($schedule->lunes == '3')
                          Lunes: Todo el día
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>
                        @if ($schedule->martes == '0')
                          Martes: No atiende
                        @elseif ($schedule->martes == '1')
                          Martes: Mañana
                        @elseif ($schedule->martes == '2')
                          Martes: Tarde
                        @elseif ($schedule->martes == '3')
                          Martes: Todo el día
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>
                        @if ($schedule->miercoles == '0')
                          Miércoles: No atiende
                        @elseif ($schedule->miercoles == '1')
                          Miércoles: Mañana
                        @elseif ($schedule->miercoles == '2')
                          Miércoles: Tarde
                        @elseif ($schedule->miercoles == '3')
                          Miércoles: Todo el día
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>
                        @if ($schedule->jueves == '0')
                          Jueves: No atiende
                        @elseif ($schedule->jueves == '1')
                          Jueves: Mañana
                        @elseif ($schedule->jueves == '2')
                          Jueves: Tarde
                        @elseif ($schedule->jueves == '3')
                          Jueves: Todo el día
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>
                        @if ($schedule->viernes == '0')
                          Viernes: No atiende
                        @elseif ($schedule->viernes == '1')
                          Viernes: Mañana
                        @elseif ($schedule->viernes == '2')
                          Viernes: Tarde
                        @elseif ($schedule->viernes == '3')
                          Viernes: Todo el día
                        @endif
                      </td>
                    </tr>
                  @endif
                </tbody>
              </table>
            @endforeach
            <p class="card-text"><small class="text-muted">MediCheck</small></p>
          </div>
        </div>
      @endif
    @endforeach
  </div>
  <main role="main" class="inner cover text-center">
    <h3></h3>
    <p class="lead">
      <a href="/appointments" class="btn btn-lg btn-secondary">Volver</a>
    </p>
  </main>
@endsection
