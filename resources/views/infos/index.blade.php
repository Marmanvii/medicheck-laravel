@extends('layout.master')

@php
    $i = 0;
@endphp

@section('content')
<div class="container">
    <h4><center>NOTICIAS</center></h4> <!--Sección de noticias -->
    <br>
    <div class="container d-inline-flex p-2 justify-content-around align-items-center align-content-between">
        <div class="row ">
            @foreach ($infos as $info)

            <div class="col s12 m12 l3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style = "height: 10rem;" src="{{$info->foto}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$info->titulo}}</h5>
                        <p class="card-text">{{str_limit($info->fecha, 100)}}</p>
                        <p class="card-text">{{str_limit($info->cuerpo, 100)}}</p>
                        <a href="{{route('infos.show', $info->id)}}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
                <br>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection