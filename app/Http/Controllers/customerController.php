<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;




class customerController extends Controller
{
    public function index()
    {
        
        
        $data = DB::table('title')
            ->join('customer', 'title.id', '=', 'customer.title_id')
            ->orderBy('customer.id', 'desc')
            ->paginate(10);
        return view('customer.customer', compact(['data']));
    }
    public function create()
    {
        $title = Title::all();
        return view('customer.create', compact('title'));
    }
    public function store(Request $request)
    {

        // $request->validate([
        //     'title_id' => 'integer',
        //     'name' => 'required | unique:customer',
        //     'address' => 'nullable',
        //     'city' => 'required|alpha',
        //     'phone' => 'numeric|nullable',
        //     'mobile' => 'numeric|nullable',
        //     'email' => 'email | nullable|unique:customer'
        // ]);


        $data['title_id'] = $request->title_id;
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['phone'] = $request->phone;
        $data['mobile'] = $request->mobile;
        $data['email'] = $request->email;
        Customer::insert($data);
        //Customer::insert($request);

        // Customer::create($request->except(['_token', 'submit']));


        // Alert::success('Success', 'Data Customer Berhasil ditambahkan');


        //Customer::create($request->except(['_token', 'submit']));
        //$customer = Customer::latest()->first();

        // return redirect('/customer/customer');
    }

    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        //$customer->update($request);
        $customer->title_id = $request->title_id;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->phone = $request->phone;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->save();

        // return redirect('/customer/customer');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        // return redirect('/customer/customer');
    }



    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');

            $data = DB::table('title')
                ->join('customer', 'title.id', '=', 'customer.title_id')
                ->orderBy('customer.id', 'desc')
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('name_title', 'like', '%' . $query . '%')
                ->orwhere('email', 'like', '%' . $query . '%')
                ->orWhere('city', 'like', '%' . $query . '%')
                ->paginate(10);

            return view('customer.customerData', compact(['data']))->render();
        }
    }

    public function read()
    {
        $data = DB::table('title')
            ->join('customer', 'title.id', '=', 'customer.title_id')
            ->orderBy('customer.id', 'desc')
            ->paginate(10);
        return view('customer.customerData', compact(['data']))->render();
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        $title = Title::all();

        return view('customer.show', compact(['customer', 'title']));
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        $title = Title::all();

        return view('customer.edit', compact(['customer', 'title']));
    }
}
