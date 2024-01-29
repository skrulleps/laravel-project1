<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_detail;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Support\Facades\Redirect;

class DetailOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orderDetail = Order_detail::All();
        return view('orderDetail.index',['orderDetail'=>$orderDetail]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $order = Order::orderBy('created_at','asc')->get();
        $produk = Produk::orderBy('created_at','asc')->get();
        return view('orderDetail.create',compact('order','produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
        $orderDetail = new Order_detail();
        $orderDetail->order_id = $request->order;
        $orderDetail->product_id = $request->produk;
        $orderDetail->qty = $request->qty;
        $orderDetail->price = $request->price;
        $orderDetail->save();
        return redirect('/orderDetail')->with(['success'=> 'Data Order Detail berhasil tersimpan']);
        } catch (\Exception $e) {
        return redirect('/orderDetail/create')->with(['error' => 'Data Order Detail Gagal tersimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $orderDetail = Order_detail::find($id);
        return view('orderDetail.detail',['orderDetail'=>$orderDetail]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $orderDetail = Order_detail::with('order')->find($id);
        $orderDetail = Order_detail::with('produk')->find($id);
        $order = Order::orderBy('created_at','asc')->get();
        $produk = Produk::orderBy('created_at','asc')->get();
        return view('orderDetail.edit',compact('orderDetail','order','produk'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
        $orderDetail = Order_detail::find($id);
        $orderDetail->order_id = $request->order;
        $orderDetail->product_id = $request->produk;
        $orderDetail->qty = $request->qty;
        $orderDetail->price = $request->price;
        $orderDetail->save();
        return redirect('/orderDetail')->with(['success'=> 'Data Order Detail <b>'.$orderDetail->order_id.'</b> berhasil Disimpan']);
        } catch (\Exception $e) {
            return redirect('/orderDetail/'.$orderDetail->id.'/edit')->with(['error' => 'Data Order Detail Gagal tersimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $model= Order_detail::find($id);
        $model->delete();
        return Redirect::to('orderDetail');
    }
}
