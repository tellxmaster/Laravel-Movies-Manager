<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pelicula;
use App\Models\Alquiler;
use Barryvdh\DomPDF\Facade as PDF;

class ReportAlquiler extends Component
{
    public $fecha, $listado, $total_ing;
    public function render()
    {   
        $fecha = '%'.$this->fecha .'%';
        return view('livewire.reporte-alquiler.view');
    }

    public function pdf()
    {
        $fecha = $_GET['fecha'];
        //$mes_lbl=$meses[$mes];
        $lista = $this->getAlquilers($fecha);
        $total_ing = $this->total_ing;
        $pdf = PDF::loadView('livewire.reporte-alquiler.pdf',compact('lista','fecha','total_ing'));
        return $pdf->stream('REPORTE-ALQUILER-CINEFLIX'.date('Y-m-d').'.pdf');
    }

    public function getAlquilers($fecha){
        $peliculas = Pelicula::all();
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

        }

        $this->total_ing = $total_ing;
        $this->listado = $listado;

        return $listado;
        
    }
}
