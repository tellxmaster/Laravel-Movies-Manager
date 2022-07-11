<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Alquiler;
use App\Models\Pelicula;
use App\Models\Socio;
use DB;

class RestingTime extends Component
{
    use WithPagination;
	protected $paginationTheme = 'bootstrap';
    public $updateMode = false;
    public function render()
    {
        $rest_time = $this->getRestingTime();
        return view('Admin.resting-time',compact('rest_time'));
    }

    public function getRestingTime(){
        $resting_time = Alquiler::select(['socio.soc_nombre','pelicula.pel_nombre','alquiler.created_at', DB::raw("DATEDIFF(alq_fecha_hasta,NOW()) AS Days")])
        ->whereRaw('DATEDIFF(alq_fecha_hasta,NOW()) >= ?', [0])
        ->join('socio','alquiler.soc_id','=','socio.id')
        ->join('pelicula','alquiler.pel_id','=','pelicula.id')
        ->orderBy('Days','asc')->paginate(6);
        return $resting_time;
    }
}
