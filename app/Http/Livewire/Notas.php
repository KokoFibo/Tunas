<?php

namespace App\Http\Livewire;


use App\Models\Nota;
use App\Models\Order;
use Livewire\Component;
use App\Models\Suratjalan;
use Illuminate\Support\Facades\DB;

class Notas extends Component
{
    public $suratjalan, $nota, $customerid, $orderid;
    public $pilihan = [];
    public function mount()
    {
        $this->nota = Nota::all();
        $this->getOrderID();
    }
    public function updatedorderid($orderid)
    {
        $this->getOrderID();
    }




    public function create()
    {
        $nomor = $this->nomorNota();
        foreach ($this->pilihan as $p) {
            DB::table('nota')->insert(

                ['suratjalan_id' => $p, 'no_nota' => $nomor, 'tanggal' => date(now())]
            );


            DB::table('suratjalan')
                ->where('id', $p)
                ->update(['nota' => $nomor]);
        }
        $this->orderid = 0;
        $this->getOrderID();
    }

    public function nomorNota()
    {
        $nonota = DB::table('nota')->max('no_nota');
        if ($nonota == '')
            $nonota = 1;
        else {
            $nonota++;
        }
        return $nonota;
    }

    public function getOrderID()
    {

        if ($this->orderid != '') {
            $this->suratjalan = Suratjalan::where('order_id', $this->orderid)->get();
        } else {
            $this->suratjalan = [];
        }
    }



    public function render()
    {

        //$order = Order::select('customer_id')->distinct()->get();

        $order = Order::all();


        return view('livewire.notas', compact(['order']));
    }
}
