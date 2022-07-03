<?php

namespace App\Http\Livewire;
use App\Models\Socio;
use App\Models\Alquiler;

use Livewire\Component;

class ReportSocio extends Component
{
    public $anio,$spm,$apm;

    public function render()
    {
        $meses=collect(
            [
                '01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo',
                '06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre',
            ]
        );
       
        return view('livewire.reporte-socio.view',['meses'=>$meses]);
    }
    public function getSocio($anio)
    {   
         $meses=collect(
            [
                '01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo',
                '06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre',
            ],
        );
        $socios_per_month = [];
        $spm = [];
        $sumSocios = 0;
        $apm=[];
        foreach($meses as $mes=>$label){

            $sumSocios = Socio::all()->whereBetween('created_at', [$anio.'-'.$mes.'-01', $anio.'-'.$mes.'-31'])->count();
            array_push($socios_per_month, $sumSocios);
            $this->getTopSocio($anio,$mes);
            array_push($apm,$this->getTopSocio($anio,$mes));
        }
        //dd($apm);
        $this->apm=$apm;
        $this->spm=$socios_per_month;
    }
    public function getTopSocio($anio,$mes)
    {
        $socios=Socio::all();
        $numSocio=[];

        foreach($socios as $socio)
        {
            $numSocio[$socio->id]=Alquiler::select('soc_id')->whereBetween('created_at', [$anio.'-'.$mes.'-01', $anio.'-'.$mes.'-31'])->where('soc_id',$socio->id)->count();
            //array_push($numSocio,$topSoc);
        }
        arsort($numSocio);
        
        
        if($numSocio[array_key_first($numSocio)]==0)
        {
          $top_soc="-";
        }
        else{
            $top_soc=Socio::all()->where('id',array_key_first($numSocio))->first()->soc_nombre;
        }

       return $top_soc;
    }
    

}
