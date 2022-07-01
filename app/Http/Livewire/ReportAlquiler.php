<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pelicula;
use App\Models\Alquiler;

class ReportAlquiler extends Component
{
    public $fecha, $listado, $total_ing;
    public function render()
    {   
        $fecha = '%'.$this->fecha .'%';
        return view('livewire.reporte-alquiler.view');
    }

    public function getAlquilers($fecha){
        //Número alquileres, Nombre de la película, género, Ingresos generados.
        $peliculas = Pelicula::all();
        $peliculas_nombres = [];
        $listado = [];
        $total_ing = 0;
        foreach($peliculas as $pelicula){
            $ingresos_pel = Alquiler::all()->where('pel_id',$pelicula->id)->where('alq_fecha_desde',$fecha)->sum('alq_valor');
            $total_ing = $total_ing + $ingresos_pel;
            array_push($listado,
            [
                'num_alq' => Alquiler::all()->where('pel_id',$pelicula->id)->where('alq_fecha_desde',$fecha)->count(),
                'pel_nombre' => $pelicula->pel_nombre,
                'gen_nombre' => $pelicula->genero->gen_nombre,
                'ingresos' => $ingresos_pel
            ]);

            //dd($num_alq,$pel_nombre,$gen_nombre,$ingresos);
        }

        //dd($total_ing);
        $this->total_ing = $total_ing;
        $this->listado = $listado;

        //dd($listado[0]['num_alq'],$listado[0]['pel_nombre'],$listado[0]['gen_nombre'],$listado[0]['ingresos']);
        return $listado;
        
    }
}
