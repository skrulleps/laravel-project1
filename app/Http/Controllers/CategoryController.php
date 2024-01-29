<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategori = Category::All();
        return view('kategori.index',['kategori'=>$kategori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
        $kategori = new Category();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();
        return redirect('/kategori')->with(['success'=> 'Data Kategori berhasil tersimpan']);
        } catch (\Exception $e) {
        return redirect('/kategori/create')->with(['error' => 'Data Kategori Gagal tersimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kategori = Category::find($id);
        return view('kategori.detail',['kategori'=>$kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kategori = Category::where('id',$id)->first();
        return view('kategori.edit',['kategori'=>$kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
        $kategori = Category::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();
        return redirect('/kategori')->with(['success'=> 'Data Kategori <b>'.$kategori->nama_kategori.'</b> berhasil Disimpan']);
        } catch (\Exception $e) {
            return redirect('/kategori/'.$kategori->id.'/edit')->with(['error' => 'Data kategori Gagal tersimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $model= Category::find($id);
        $model->delete();
        return Redirect::to('kategori');
    }
}
