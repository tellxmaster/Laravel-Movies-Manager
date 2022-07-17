<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Genero;
use App\Models\Pelicula;
use App\Models\Alquiler;
use Barryvdh\DomPDF\Facade as PDF;

class ReportIngreso extends Component
{
    public $filtro_mes, $filtro_gen, $list_pel, $resultFound, $num_busq, $porcentajes, $porcentajes_lbl, $ing_total;
    public function render()
    {
        $generos = Genero::pluck('gen_nombre','id');
        $meses=collect(
            [
                '01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio',
                '07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre',
            ]
        );
        $spm = 0;
        return view('livewire.reporte-ingreso.view',compact('generos','meses','spm'));
    }

    public function pdf(){
        $mes = $_GET['mes'];
        $gen = $_GET['gen']; 
        dd($this->getPelIncome($mes, $gen));
        $list_pel = [];
        $list_pel = $this->getPelIncome($mes, $gen);
        //dd($lista);
        $ing_total = $this->ing_total;
        $pdf = PDF::loadView('livewire.reporte-ingreso.pdf',compact('list_pel','mes','gen','ing_total'));
        return $pdf->stream('REPORTE-INGRESO-CINEFLIX'.date('Y-m-d').'.pdf');
    }

    public function getPelIncome($mes, $genero){
        $peliculas = Pelicula::all()->where('gen_id', $genero);
        //$mes = date('m',$mes);
        $list = [];
        foreach($peliculas as $pelicula)
        {
            //dd('2022-'.$mes.'-01');
            //$mes = date('m',$mes);
            $num_alq = Alquiler::all()->where('pel_id',($pelicula->id))->whereBetween('alq_fecha_desde', ['2022-0'.$mes.'-01', '2022-0'.$mes.'-31'])->count();
            $total = Alquiler::all()->where('pel_id',$pelicula->id)->whereBetween('alq_fecha_desde', ['2022-0'.$mes.'-01', '2022-0'.$mes.'-31'])->sum('alq_valor');
            $item = collect(
                [
                    'num_alq'    => $num_alq,
                    'pel_nombre' => $pelicula->id,
                    'pel_nombre' => $pelicula->pel_nombre,
                    'pel_precio' => $pelicula->pel_costo,
                    'total'      => $total,
                ]
            );
            if($item['num_alq'] > 0){
                array_push($list, $item);
            }
            
        }
        //dd($list);
        
        $suma_tot = 0;
        for($i=0; $i<count($list); $i++){
            $suma_tot = $suma_tot + $list[$i]['total'];
        }

        $percentage = [];
        $percentage_labels = [];
        for($i=0; $i<count($list); $i++){
            array_push($percentage,($list[$i]['total']*100)/$suma_tot);
            array_push($percentage_labels,($list[$i]['pel_nombre']));
        }
        $this->porcentajes = $percentage;
        $this->porcentajes_lbl = $percentage_labels;
        $this->ing_total = $suma_tot;
        //dd($suma_tot, $percentage);

        $this->list_pel = $list;
        //dd($list);
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

    public function renderData(){
        $this->num_busq = 1;
    }

}
