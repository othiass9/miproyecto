<?php

namespace App\Services;

use App\Clases;

class ListClases
{
    public function get()
    {
        $clases = Clases::get();
        $clasesArray[''] = 'Selecciona una clase';
        foreach ($clases as $clase) {
            $clasesArray[$clase->id] = $clase->clase;
        }
        return $clasesArray;
    }
}