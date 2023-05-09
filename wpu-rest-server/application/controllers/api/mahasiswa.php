<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'controllers/Format.php';
require APPPATH . 'controllers/RestController.php';

class Mahasiswa extends RestController
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Mhs_model', 'mhs');

        $this->methods['index_get']['limit'] = 10;
        $this->methods['index_post']['limit'] = 5;
        $this->methods['index_put']['limit'] = 2;
        $this->methods['index_delete']['limit'] = 2;
    }
    //METHOD GET
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $mhs = $this->mhs->getMhs();
        } else {
            $mhs = $this->mhs->getMhs($id);
        }
        if ($mhs) {
            $this->response([
                'status' => true,
                'data' => $mhs
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id tidak ditemukan'
            ], 404);
        }
    }
    //METHOD DELETE
    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id == NULL) {
            $this->response([
                'status' => false,
                'message' => 'Provide an id'
            ], 400);
        } else {
            if ($this->mhs->deleteMhs($id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted'
                ], 204);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'ID tidak ditemukan'
                ], 400);
            }
        }
    }
    //METHOD POST
    public function index_post()
    {
        $data = [
            'npm' => $this->post('npm'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];
        if ($this->mhs->createMhs($data) > 0) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'Mahasiswa berhasil ditambahkan'
            ], 201);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Mahasiswa gagal ditambahkan'
            ], 400);
        }
    }
    //METHOD PUT
    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'npm' => $this->put('npm'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan'),
        ];
        if ($this->mhs->updateMhs($data, $id) > 0) {
            $this->response([
                'status' => true,
                'data' => $data,
                'message' => 'Mahasiswa berhasil diUPDATE'
            ], 201);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Mahasiswa UPDATE DATA'
            ], 400);
        }
    }
}
