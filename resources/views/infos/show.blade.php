@extends('layout.master')

@section('content')
<center>
<div class="card d-inline-flex p-2 justify-content-around align-items-center" style="width:90%;">
    <div class="card-body" align="center">
        <h1>{{$info->titulo}}</h1>
        <br>
        <img class="" style = "height: 20rem;" src="/{{$info->foto}}" alt=" "/>
        <br>
        <br>
        <div style="word-break: break-all;
        white-space: normal;
        width: 80%;">
            {{$info->cuerpo}}
        </div>
    </div>
  </div>
</center>
@endsection