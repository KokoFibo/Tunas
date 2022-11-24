<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Order;
use Livewire\Component;

use App\Models\Suratjalan;
use Illuminate\Support\Facades\DB;

class Suratjalans extends Component
{
    public  $customerId, $order_id, $order, $order2, $quantity, $tanggal, $no_sj, $suratjalan, $customer, $hide = 0, $nomorsj, $btn = 1;

    public function mount()
    {
        $this->suratjalan = Suratjalan::orderBy('id', 'DESC')->limit(1)->get();
        //$this->suratjalan = Suratjalan::orderBy('id', 'DESC')->get();
        $this->tanggal = date(now());
        $this->no_sj = $this->nomorSj();
        $this->nomorsj = $this->no_sj;
        $this->customer = Customer::all();
        // $this->order = Order::distinct()->get(['customer_id']);
        $this->order = Order::all();


        $this->getCustomerID();
    }
    public function nomorSj()
    {
        $nosj = DB::table('suratjalan')->max('no_sj');
        if ($nosj == '')
            $nosj = 1;
        else {
            $nosj++;
        }
        return $nosj;
    }



    public function store()
    {
        $validatedData = $this->validate([
            'order_id' => 'required',
            'no_sj' => 'required',
            'quantity' => 'required',
            'tanggal' => 'required'
        ]);
        Suratjalan::create($validatedData);
        session()->flash('message', 'Surat Jalan Created Succesfully');
        $this->resetValidation();
        $this->quantity = 10;
        $this->hide = 1;
        $this->suratjalan = Suratjalan::where('no_sj', $this->no_sj)->get();
        $this->btn = 0;
    }

    public function updatedcustomerId($customerId)
    {
        $this->getCustomerID();
    }

    public function getCustomerID()
    {

        if ($this->customerId != '') {
            $this->order2 = Order::where('customer_id', $this->customerId)->get();
        } else {
            $this->order2 = [];
        }
    }

    public function delete($id)
    {
        Suratjalan::find($id)->delete();
        $this->suratjalan = Suratjalan::where('no_sj', $this->no_sj)->get();
        $this->btn = 1;
    }

    public function render()
    {
        return view('livewire.suratjalans');
    }
}
