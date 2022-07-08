<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Genero;
use App\Models\Pelicula;
use App\Models\Alquiler;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;
use DB;

class ReportTop extends Component
{
    public $opcion, $top_generos, $months;
    public function render()
    {
        $meses=collect(
            [
                '01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio',
                '07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre',
            ]
        );
        $opcion = '%'.$this->opcion .'%';
        $generos=Genero::pluck('gen_nombre','id');
        return view('livewire.reporte-top.view',['generos' => $generos, 'meses'=>$meses]);
    }

    public function pdf()
    {
        $meses=collect(
            [
                '01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio',
                '07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre',
            ]
        );
        $mes = $_GET['mes'];
        $mes_lbl=$meses[$mes];
        $lista=$this->getTopFive($mes);
        $pdf = PDF::loadView('livewire.reporte-top.pdf',compact('lista','mes_lbl'));
        return $pdf->stream('REPORTE-TOP-CINEFLIX'.date('Y-m-d').'.pdf');
    }

    private function resetInput()
    {		
		$this->top_generos = null;
    }

    public function getTopFive($mes){
        $generos = Genero::all();
        $top = [];
       
        foreach($generos as $genero){
            $top[$genero->gen_nombre] = (DB::table('pelicula')->select('pelicula.id','pel_nombre','gen_id','alquiler.alq_fecha_desde')->join('alquiler','alquiler.pel_id','pelicula.id')->where('gen_id',$genero->id)->whereBetween('alquiler.alq_fecha_desde', ['2022-'.$mes.'-01', '2022-'.$mes.'-31'])->count());
        }
        arsort($top);
        while(count($top)>5){
            array_pop($top);
        }
        $this->resetInput();
        $this->top_generos = $top;
        return $top;
    }
}
