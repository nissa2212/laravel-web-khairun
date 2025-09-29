<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data ['username']          = 'Heroku';
        $data ['last_login']        = date('Y-m-d H:i:s');
        $data ['list_pendidikan']   = ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];
        return view('home', $data);
    }

}
