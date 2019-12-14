<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    $duracion = $schedule->duracion; 
    $dia = date("w",strtotime($fecha)); 
    ?>
    @if($dia == '1') <!--Por lo que al ser del 1 al 7, obtendremos el horario de atencion comparando con el dia actual de la semana y el valor del dia en el dia correspondiente-->
    <?php
        $atencion = $schedule->lunes;
    ?>
    @endif
    @if($dia == '2')
        <?php
        $atencion = $schedule->martes;
        ?>
    @endif
    @if($dia == '3')
        <?php
        $atencion = $schedule->miercoles;
        ?>
    @endif
    @if($dia == '4')
        <?php
        $atencion = $schedule->jueves;
        ?>
    @endif
    @if($dia == '5')
        <?php
        $atencion = $schedule->viernes;
        ?>
    @endif
    @if($atencion == '1') 
        <?php
        $inicio = strtotime("08:00am");
        $final = strtotime("08:00am");
        $tiempo = ($duracion*60)*$duracion;
        $inicio = $inicio + $tiempo; 
        $final = $inicio + ($duracion*60); 
        ?>
    @endif
    @if($atencion == '2') 
        <?php
        $inicio = strtotime("02:00pm");
        $final = strtotime("02:00pm");
        $tiempo = ($duracion*60)*$duracion;
        $inicio = $inicio + $tiempo;
        $final = $inicio + ($duracion*60);
        ?>
    @endif
    @if($atencion == '3')
        <?php
        $inicio = strtotime("08:00am");
        $final = strtotime("08:00am");
        $tiempo = ($duracion*60)*$duracion;
        $inicio = $inicio + $tiempo;
        $final = $inicio + ($duracion*60);
        ?>
        @if($inicio >= strtotime("01:00pm"))
        <?php
            $inicio = $inicio + 3600;
            $final = $final + 3600;
        ?>
        @endif
    @endif

    <h2>¡Cita Registrada exitosamente!</h2>
    <h3>Su cita ha sido agendada con el Doctor: {{$medic->name}} {{$medic->last_name}}</h3>
    <h4>
        Fecha: {{$fecha}} <br>
        Horario de Atención: {{date("H:i",$inicio)}} - {{date("H:i",$final)}} <br>
    </h4>
    <h2>Lo esperamos en 4 norte 3364</h2>
    <h5>Consultas al número 600222222</h5>
</body>
</html>