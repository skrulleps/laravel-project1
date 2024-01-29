<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;//sisipkan model siswa
use Illuminate\Support\Facades\Redirect;
class SiswaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $siswa = Siswa::All();
        return view("siswa.Index",["siswa"=>$siswa]);
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('siswa.Create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->no_hp = $request->no_hp;
        $siswa->save();
        return Redirect::to('siswa');
    }

    /**
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $siswa = Siswa::find($id);
        return view('siswa.detail',['siswa'=>$siswa]);
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $siswa = Siswa::where('id_siswa',$id)->first();
        return view('siswa.Edit',['siswa'=>$siswa]);
    }
    
    public function update(Request $request, $id){
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->no_hp = $request->no_hp;
        $siswa->save();
        return Redirect::to('siswa');
    }

    public function destroy($id){
        $model= Siswa::find($id);
        $model->delete();
        return Redirect::to('siswa');
    }
}
