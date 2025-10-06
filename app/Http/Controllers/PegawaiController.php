<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'Ahmad Rizki',
            'tanggal_lahir' => '1998-05-15', 
            'hobbies' => ['Membaca', 'Programming', 'Bersepeda', 'Fotografi', 'Bermain Musik', 'Traveling'],
            'tgl_harus_wisuda' => '2024-12-31',
            'current_semester' => 4,
            'future_goal' => 'Menjadi Software Architect'
        ];

        $umur = Carbon::parse($data['tanggal_lahir'])->age;

        $hariIni = Carbon::now();
        $tglWisuda = Carbon::parse($data['tgl_harus_wisuda']);
        $jarakHari = $hariIni->diffInDays($tglWisuda, false);

        $semesterInfo = '';
        if ($data['current_semester'] < 3) {
            $semesterInfo = 'Masih Awal, Kejar TAK';
        } else {
            $semesterInfo = 'Jangan main-main, kurang-kurangi main game!';
        }

        $displayData = [
            'name' => $data['name'],
            'my_age' => $umur . ' tahun',
            'hobbies' => $data['hobbies'],
            'tgl_harus_wisuda' => $tglWisuda->format('d F Y'),
            'time_to_study_left' => $jarakHari >= 0 ? $jarakHari . ' hari lagi' : 'Sudah lewat ' . abs($jarakHari) . ' hari',
            'current_semester' => 'Semester ' . $data['current_semester'],
            'semester_info' => $semesterInfo,
            'future_goal' => $data['future_goal']
        ];

        return view('pegawai.index', compact('displayData'));
    }
}
