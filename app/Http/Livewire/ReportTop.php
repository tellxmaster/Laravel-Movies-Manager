<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Genero;
use App\Models\Pelicula;
use App\Models\Alquiler;
use DB;

class ReportTop extends Component
{
    public $opcion, $top_generos;
    public function render()
    {
        $meses=collect(
            [
                '01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo',
                '06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre',
            ]
        );
        $opcion = '%'.$this->opcion .'%';
        $generos=Genero::pluck('gen_nombre','id');
        //dd($generos, $meses);
        return view('livewire.reporte-top.view',['generos' => $generos, 'meses'=>$meses]);
    }

    public function pdf()
    {
        $lista = $this->top_generos;
        //dd($generos, $meses);
        return view('livewire.reporte-top.pdf',['lista' => $lista]);
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

        //$top = collect($top);
        //dd($top);
        return $top;
    }
}
