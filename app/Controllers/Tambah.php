<?php

namespace App\Controllers;

use App\Models\Karyawan;

class Tambah extends BaseController
{

    public function index()
    {
        return view('tambah');
    }

    public function edit($id)
    {
        $model = new Karyawan;
        $getKaryawan = $model->getkaryawan($id)->getRow();
        if (isset($getKaryawan)) {
            $data['karyawan'] = $getKaryawan;
            $data['title']  = 'Edit ' . $getKaryawan->nama;


            return view('edit', $data);
        } else {

            echo '<script>
                    alert("ID Karyawan ' . $id     . ' Tidak ditemukan");
                    window.location="' . base_url('Karyawan') . '"
                </script>';
        }
    }

    public function save()
    {
        $model = new Karyawan;
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'tanggal_lahir'         => $this->request->getPost('tanggal_lahir'),
            'gaji'  => $this->request->getPost('gaji'),
            'status'  => $this->request->getPost('status')
        );
        $model->saveKaryawan($data);
        echo '<script>
                alert("Sukses Tambah Karyawan");
                window.location="' . base_url('tambah') . '"
            </script>';
    }

    public function hapus($id)
    {
        $model = new Karyawan;
        $getKaryawan = $model->getkaryawan($id)->getRow();
        if (isset($getKaryawan)) {
            $model->hapusKaryawan($id);
            echo '<script>
                    alert("Hapus Data Karyawan Sukses");
                    window.location="' . base_url() . '"
                </script>';
        } else {

            echo '<script>
                    alert("Hapus Gagal !, ID Karyawan ' . $id . ' Tidak ditemukan");
                    window.location="' . base_url() . '"
                </script>';
        }
    }


    public function update()
    {
        $model = new Karyawan;
        $id = $this->request->getPost('id');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'tanggal_lahir'         => $this->request->getPost('tanggal_lahir'),
            'gaji'  => $this->request->getPost('gaji'),
            'status'  => $this->request->getPost('status')
        );
        $model->editKaryawan($data, $id);
        echo '<script>
                alert("Sukses Edit Karyawan");
                window.location="' . base_url() . '"
            </script>';
    }
}
