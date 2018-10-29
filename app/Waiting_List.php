<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waiting_List extends Model
{
    public $table = "waiting_lists"; #asociamos el modelo a la tabla waiting_lists, al ser dos palabras no lo asocia automáticamente como en los otros casos
}
