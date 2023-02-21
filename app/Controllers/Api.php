<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Karyawan;

class Api extends BaseController
{
    use ResponseTrait;


    public function index()
    {
        $model = new Karyawan;
        $data['karyawan'] = $model->getkaryawan();
        return $this->respond($data);
    }




    public function create()
    {
        $model = new Karyawan;
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'tanggal_lahir'         => $this->request->getPost('tanggal_lahir'),
            'gaji'  => $this->request->getPost('gaji'),
            'status'  => $this->request->getPost('status')
        );

        $model->insert($data);

        $response = [
            'messages' => [
                'success' => 'Data karyawan berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }


    public function show($id = null)
    {
        $model = new Karyawan;
        $getKaryawan = $model->getkaryawan($id)->getRow();
        if ($getKaryawan) {
            return $this->respond($getKaryawan);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }


    public function update($id = null)
    {
        $model = new Karyawan;
        $id = $this->request->getPost('id');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'tanggal_lahir'         => $this->request->getPost('tanggal_lahir'),
            'gaji'  => $this->request->getPost('gaji'),
            'status'  => $this->request->getPost('status')
        );
        $update = $model->editKaryawan($data, $id);
        if ($update) {
            $response = [
                'messages' => [
                    'success' => 'Data karyawan berhasil diubah.'
                ]
            ];
        } else {
            $response = [
                'messages' => [
                    'success' => 'Gagal update data.'
                ]
            ];
        }
        return $this->respond($response);
    }



    public function delete($id = null)
    {
        $model = new Karyawan;
        $getKaryawan = $model->getkaryawan($id)->getRow();
        if ($getKaryawan) {
            $model->hapusKaryawan($id);
            $response = [
                'messages' => [
                    'success' => 'Data karyawan berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}
