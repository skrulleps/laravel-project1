<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customer = Customer::All();
        return view('customer.index',['customer'=>$customer]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
        $customer = new Customer();
        $customer->email = $request->email;
        $customer->nama_customer = $request->nama_customer;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();
        return redirect('/customer')->with(['success'=> 'Data Customer berhasil tersimpan']);
        } catch (\Exception $e) {
        return redirect('/customer/create')->with(['error' => 'Data Customer Gagal tersimpan']);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $customer = Customer::find($id);
        return view('customer.detail',['customer'=>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $customer = Customer::where('id',$id)->first();
        return view('customer.edit',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
        $customer = Customer::find($id);
        $customer->email = $request->email;
        $customer->nama_customer = $request->nama_customer;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();
        return redirect('/customer')->with(['success'=> 'Data customer <b>'.$customer->nama_customer.'</b> berhasil Disimpan']);
        } catch (\Exception $e) {
            return redirect('/kategori/'.$customer->id.'/edit')->with(['error' => 'Data kategori Gagal tersimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $model= Customer::find($id);
        $model->delete();
        return Redirect::to('customer');
    }
}
