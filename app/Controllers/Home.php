<?php

namespace App\Controllers;

use App\Models\Karyawan;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function show()
    {
        $model = new Karyawan;
        $data['title']     = 'Data Karyawan';
        $data['karyawan'] = $model->getkaryawan();
        return view('Home', $data);
        // return view('Home');
    }
}
