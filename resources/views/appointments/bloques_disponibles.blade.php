@extends('layout.master')
@section('content')
  <h1 align="center">Bloques Disponibles</h1>
  <table class="table table-bordered table-dark table-hover table-sm" style="text-align: center; margin:0px auto;width: 64rem;%;">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Hora</th>
        <th scope="col">Disponibilidad</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>1</th>
        <td>8:30 - 9:00</td>
        @if($bloque_1==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="1">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=1>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>2</th>
        <td>9:00 - 9:30</td>
        @if($bloque_2==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="2">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=2>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>3</th>
        <td>9:30 - 10:30</td>
        @if($bloque_3==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="3">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=3>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>4</th>
        <td>10:00 - 10:30</td>
        @if($bloque_4==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="4">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=4>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>5</th>
        <td>10:30 - 11:00</td>
        @if($bloque_5==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="5">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=5>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>6</th>
        <td>11:00 - 11:30</td>
        @if($bloque_6==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="6">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=6>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>7</th>
        <td>11:30 - 12:00</td>
        @if($bloque_7==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="7">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=7>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>8</th>
        <td>12:00 - 12:30</td>
        @if($bloque_8==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="8">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=8>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>9</th>
        <td>12:30 - 13:00</td>
        @if($bloque_9==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="9">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=9>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>10</th>
        <td>15:00 - 15:30</td>
        @if($bloque_10==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="10">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=10>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>11</th>
        <td>15:30 - 16:00</td>
        @if($bloque_11==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="11">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=11>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>12</th>
        <td>16:00 - 16:30</td>
        @if($bloque_12==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="12">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=12>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
      <tr>
        <th>13</th>
        <td>16:30 - 17:00</td>
        @if($bloque_13==0)
          <td>
            Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/appointments/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value="13">
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit">Solicitar Hora</button>
              </form>
            </div>
          </td>
        @else
          <td>
            No Disponible
          </td>
          <td>
            <div class="floatright">
              <form action="/esperas/create" method="POST">
                {{csrf_field()}}
                <input name="bloque" type="hidden" value=13>
                <input name="fecha" type="hidden" value="{{$fecha}}">
                <input name="medics_id" type="hidden" value="{{$medico}}">
                <button class="btn btn-outline-light" type="submit" disabled>Ocupado</button>
              </form>
            </div>
          </td>
        @endif
      </tr>
    </tbody>
  </table>
  </main>

@endsection
