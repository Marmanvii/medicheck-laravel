<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <title>MediCheck</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,,800,900);
        html {
          width: 100%;
          height: 100%;
        }

        body {
          background: -webkit-linear-gradient(#ebece7, white);
          background: linear-gradient(#ebece7, white);
          margin: 0;
          width: 100%;
          height: 100%;
          font-family: 'Raleway', sans-serif;
        }

        .container {
          position: absolute;
          -webkit-transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
          left: 50%;
          top: 50%;
        }

        .title {
          font-weight: 800;
          color: transparent;
          font-size: 200px;
          background: url("/images/doc1.jpg") repeat;
          background-position: 40% 50%;
          -webkit-background-clip: text;
          position: relative;
          padding-bottom: 50px;
          text-align: center;
          line-height: 150px;
          letter-spacing: -8px;
        }

        .subtitle {
          display: block;
          text-align: center;
          text-transform: uppercase;
          padding-top: 10px;
        }

        </style>
    </head>
    <body>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag ---------->

<!-- If you don't see it u probably are using a browser not based on webkit, so leave IE and grab anything else (Y) -->
<!-- UPDATE: works in Chrome & Safari, not Firefox. To solve that you could use an SVG insted of pure text. -->

<div class="container">
<div class="title">MEDICHECK</div>
<div class="subtitle">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth<!--Solo se muestra si existe un usario activo en la sesion-->
                <a class="btn btn-outline-dark" href="{{ url('/appointments') }}">Inicio</a>
            @else
                <a class="btn btn-outline-dark" href="{{ route('login') }}">Iniciar Sesión</a>
                <a class="btn btn-outline-dark" href="{{ route('register') }}">Registrarse</a>
            @endauth
        </div>
    @endif
</div>
</div><!--Efecto estetico al mover el mouse a traves de la pagina-->
<script>


  $(document).ready(function(){
var mouseX, mouseY;
var ww = $( window ).width();
var wh = $( window ).height();
var traX, traY;
$(document).mousemove(function(e){
  mouseX = e.pageX;
  mouseY = e.pageY;
  traX = ((4 * mouseX) / 570) + 40;
  traY = ((4 * mouseY) / 570) + 50;
  console.log(traX);
  $(".title").css({"background-position": traX + "%" + traY + "%"});
});
});

</script>
    </body>
</html>
