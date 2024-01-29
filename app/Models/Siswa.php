<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'tbl_siswa'; //nama tabel di database
    public $timestamps = false;
    protected $primaryKey = 'id_siswa'; //nama kolom PK di database

   
}
