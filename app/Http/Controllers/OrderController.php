<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $order = Order::All();
        return view('order.index',['order'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $customer = Customer::orderBy('created_at','asc')->get();
        $user = User::orderBy('created_at','asc')->get();
        return view('order.create',compact('customer','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
        $order = new Order();
        $order->invoice = $request->invoice;
        $order->customer_id = $request->customer;
        $order->user_id = $request->user;
        $order->total = $request->total;
        $order->save();
        return redirect('/order')->with(['success'=> 'Data Order berhasil tersimpan']);
        } catch (\Exception $e) {
        return redirect('/order/create')->with(['error' => 'Data Order Gagal tersimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $order = Order::find($id);
        return view('order.detail',['order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $order = Order::with('customer')->find($id);
        $order = Order::with('user')->find($id);
        $customer = Customer::orderBy('created_at','asc')->get();
        $user = User::orderBy('created_at','asc')->get();
        return view('order.edit',compact('order','customer','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
        $order = Order::find($id);
        $order->invoice = $request->invoice;
        $order->customer_id = $request->customer;
        $order->user_id = $request->user;
        $order->total = $request->total;
        $order->save();
        return redirect('/order')->with(['success'=> 'Data Order <b>'.$order->invoice.'</b>berhasil Disimpan']);
        } catch (\Exception $e) {
            return redirect('/order/'.$order->id.'/edit')->with(['error' => 'Data Order Gagal tersimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $model= Order::find($id);
        $model->delete();
        return Redirect::to('order');
    }

    public function addOrder()
    {
        //
            $customer = Customer::orderBy('nama_customer', 'ASC')->get();
            $user = User::orderBy('name', 'ASC')->get();
            $maxKode = Order::max('invoice');
            // Mengambil bagian numerik dari $maxKode
    $numericPart = intval(substr($maxKode, 1));

    // Menambahkan 1 ke bagian numerik
    $numericPart++;

    // Menggabungkan kembali dengan bagian tetap dan bagian numerik yang diperbarui
    $newMaxKode = 'P' . sprintf('%04d', $numericPart);

    $invoice = $newMaxKode;

            return view('invoice.add', compact('customer','user','invoice'));
        }
        
        public function storeOrder(Request $request)
        {
            try {
            $order = new Order();
            $order->invoice = $request->invoice;
            $order->customer_id = $request->customer;
            $order->user_id = $request->user;
            $order->total = 0;
            $order->save();
            
            return redirect(route('invoice.create', ['id' => $order->id]));
            } catch(\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
    }
    public function createOrder($id)
    {
        $orders = Order::with(['customer', 'user'])->find($id);
        $products = produk::orderBy('id', 'ASC')->get();
        $orderDetails = Order_detail::select('produks.nama_produk', 'order_details.qty', 'order_details.price','order_details.id')
        ->join('produks', 'order_details.product_id', '=', 'produks.id')
        ->where('order_details.order_id', $id)
        ->get();
        return view('invoice.create', compact('orders', 'products','orderDetails'));
    }

    public function updateOrder(Request $request, $id)
    {

        try {
            $order = Order::find($id);
            $product = produk::find($request->product_id);
            $jumlah = $request->qty;
            $price = $jumlah * $product->price;

            $orderDetail = new Order_detail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $request->product_id;
            $orderDetail->qty = $jumlah;
            $orderDetail->price = $price;
            $orderDetail->save();

            $order->total += $price;
            $order->save();
            return redirect()->back()->with(['success' => 'Product Telah Ditambahkan']);
            
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function deleteOrder($id)
    {
        $detail = order_detail::find($id);
        $detail->delete();
        return redirect()->back()->with(['success' => 'Product telah dihapus']);
    }

}
