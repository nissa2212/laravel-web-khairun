<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        return "menampilkan data-data matakuliah";
    }

    public function show($kode = null)
{
    if ($kode) {
        return "kamu sedang mengakses matakuliah $kode";
    }else{
        return "masukanlah kode matakuliah";
    }
}
}

