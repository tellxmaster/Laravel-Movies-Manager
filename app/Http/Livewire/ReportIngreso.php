<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Genero;
use App\Models\Pelicula;
use App\Models\Alquiler;

class ReportIngreso extends Component
{
    public $filtro_mes, $filtro_gen, $list_pel, $resultFound, $num_busq;
    public function render()
    {
        $generos = Genero::pluck('gen_nombre','id');
        $meses=collect(
            [
                '01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio',
                '07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre',
            ]
        );
        return view('livewire.reporte-ingreso.view',compact('generos','meses'));
    }

    public function getPelIncome($mes, $genero){
        //dd($mes,$genero);
        $peliculas = Pelicula::all()->where('gen_id', $genero);
        $list = [];
        foreach($peliculas as $pelicula)
        {
            $item = collect(
                [
                    'num_alq'    => Alquiler::all()->whereBetween('alq_fecha_desde', ['2022-0'.$mes.'-01', '2022-0'.$mes.'-31'])->where('pel_id',$pelicula->id)->count(),
                    'pel_nombre' => $pelicula->pel_nombre,
                    'pel_precio' => $pelicula->pel_costo,
                    'total'      => Alquiler::all()->whereBetween('alq_fecha_desde', ['2022-0'.$mes.'-01', '2022-0'.$mes.'-31'])->where('pel_id',$pelicula->id)->sum('alq_valor'),
                ]
            );
            if($item['num_alq'] > 0){
                array_push($list, $item);
            }
        }
        

        $this->list_pel = $list;
        if(count($list)>0){
            $this->resultFound = true;
        }else{
            $this->num_busq = 1;
            $this->resultFound = false;
        }
    }
    public function restData(){
        $this->num_busq = 0;
    }
}
