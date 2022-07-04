<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Genero;
use App\Models\Pelicula;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Alquiler;
use DB;

class ReportGenero extends Component
{
    public $list_generos, $genero, $sum_gen;
    public function render()
    {
        $generos = Genero::pluck('gen_nombre','id');
        return view('livewire.reporte-genero.view',['generos'=>$generos]);
    }

    
    public function pdf()
    {
        $genero = $_GET['genero'];
        $genero_lbl = Genero::select('gen_nombre')->where('id',$genero)->first()->gen_nombre;
        $lista=$this->filterByGender($genero);
        $total_ing = $this->sum_gen;
        $pdf = PDF::loadView('livewire.reporte-genero.pdf',compact('lista','genero_lbl','total_ing'));
        return $pdf->stream('REPORTE-GENERO-CINEFLIX'.date('Y-m-d').'.pdf');
    }

    public function filterByGender($genero){
        $peliculas = Pelicula::all();
        $listado_pel = [];
        $i=0;

        $pel = (DB::table('pelicula')->select('id','pel_nombre','pel_fecha_estreno','gen_id')->where('gen_id',$genero)->get())->map(function($pel){
               return ['id'=>$pel->id, 'nombre'=>$pel->pel_nombre,'fecha_est'=>$pel->pel_fecha_estreno];
        });

        $ids_pel = (Pelicula::select('id')->where('gen_id',$genero)->get()->toArray());
        $suma_tot = 0;
        for($i=0; $i<count($ids_pel); $i++){
            $suma_tot = $suma_tot + (Alquiler::all()->where('pel_id',$ids_pel[$i]['id'])->sum('alq_valor'));
        }

        $this->sum_gen = $suma_tot;
        $listado_pel = $this->list_generos = $pel->toArray();
        //dd($this->list_generos, $this->sum_gen);
        return $listado_pel;
        
    }
}
