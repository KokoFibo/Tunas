<?php

namespace App\Http\Livewire;

use App\Models\Title;
use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = false;
    public $title;
    public $title_id, $name, $address, $city, $phone, $mobile, $email;
    public $customer_id;

    public function resetInputFields()
    {
        $this->title_id = '';
        $this->name = '';
        $this->address = '';
        $this->city = '';
        $this->phone = '';
        $this->mobile = '';
        $this->email = '';
    }

    public function closeModal()
    {
        $this->resetInputFields();
    }

    protected function rules()
    {
        return [
            'title_id' => 'required',
            'name' => 'required',
            'address' => 'string|max:255|nullable',
            'city' => 'required',
            'phone' => 'string|max:255|nullable',
            'mobile' => 'string|max:255|nullable',
            'email' => 'string|max:255|nullable',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }



    // public function mount()
    // {
    //     $this->title = Title::all();
    // }

    public function store()
    {
        $validatedData = $this->validate();

        Customer::create($validatedData);
        session()->flash('message', 'Customer Created Succesfully');
        $this->resetInputFields();
        $this->resetValidation();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function show($customer_id)
    {
        $customer = Customer::find($customer_id);
        if ($customer) {

            $this->customer_id = $customer->id;
            $this->title_id = $customer->title_id;
            $this->name = $customer->name;
            $this->address = $customer->address;
            $this->city = $customer->city;
            $this->phone = $customer->phone;
            $this->mobile = $customer->mobile;
            $this->email = $customer->email;
        } else {
            return redirect()->to('/');
        }
    }

    public function edit($customer_id)
    {
        $customer = Customer::find($customer_id);
        if ($customer) {

            $this->customer_id = $customer->id;
            $this->title_id = $customer->title_id;
            $this->name = $customer->name;
            $this->address = $customer->address;
            $this->city = $customer->city;
            $this->phone = $customer->phone;
            $this->mobile = $customer->mobile;
            $this->email = $customer->email;
        } else {
            return redirect()->to('/');
        }
    }

    public function destroy()
    {

        Customer::find($this->customer_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputFields();
        session()->flash('message', 'Customer deleted succesfully');
    }

    public function delete($customer_id)
    {
        $customer = Customer::find($customer_id);
        if ($customer) {

            $this->customer_id = $customer->id;
        } else {
            return redirect()->to('/');
        }
    }

    public function update()
    {
        $validatedData = $this->validate();
        Customer::where('id', $this->customer_id)->update([
            'title_id' => $validatedData['title_id'],
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'phone' => $validatedData['phone'],
            'mobile' => $validatedData['mobile'],
            'email' => $validatedData['email']
        ]);
        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('message', 'Student updated succesfully');
    }



    public function render()
    {
        $this->title = Title::all();

        return view('livewire.customers', [
            'customer' => Customer::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->Paginate($this->perPage), 'title',
        ]);
    }
}
