@foreach ($users as $user)
  @if($user->id == $id_user)
    <h2 class="text-center">Prescripción de {{$user->name}} {{$user->last_name}}</h2>
    <h3 class="text-center">{{$user->rut}} - {{$user->email}}</h3>
    <h3 class="text-center">{{now()->toDateString()}}</h3>
    @endif
@endforeach

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
