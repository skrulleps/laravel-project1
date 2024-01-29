<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::All();
        return view('produk.index', ['produk'=> $produk]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Category::orderBy('created_at','asc')->get();
        return view('produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->keterangan = $request->keterangan;
        $produk->stock = $request->stock;
        $produk->price = $request->price;
        $produk->category_id = $request->kategori;
        $produk->save();
        return redirect('/produk')->with(['success'=> 'Data Produk berhasil tersimpan']);
        } catch (\Exception $e) {
        return redirect('/produk/create')->with(['error' => 'Data Produk Gagal tersimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $produk = Produk::find($id);
        return view('produk.detail',['produk'=>$produk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $produk = Produk::with('category')->find($id);
        $kategori = Category::orderBy('created_at','asc')->get();
        return view('produk.edit',compact('produk'),compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
        $produk = Produk::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->keterangan = $request->keterangan;
        $produk->stock = $request->stock;
        $produk->price = $request->price;
        $produk->category_id = $request->kategori;
        $produk->save();
        return redirect('/produk')->with(['success'=> 'Data Produk <b>'.$produk->nama_produk.'</b>berhasil Disimpan']);
        } catch (\Exception $e) {
            return redirect('/produk/'.$produk->id.'/edit')->with(['error' => 'Data Produk Gagal tersimpan']);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $model= Produk::find($id);
        $model->delete();
        return Redirect::to('produk');
    }
}
