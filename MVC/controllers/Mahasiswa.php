<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'controllers/Format.php';
require APPPATH . 'controllers/RestController.php';

class Mahasiswa extends RestController
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Mydb');
        $this->methods['index_get']['limit'] = 10;
        $this->methods['index_post']['limit'] = 5;
        $this->methods['index_put']['limit'] = 5;
        $this->methods['index_delete']['limit'] = 5;
    }
    //METHOD GET
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $mhs = $this->db->query("SELECT id_pmb as id_mhs, npm, nama as nm_pd, alamat,
			telp as no_hp, email
				FROM t_anggota 
				WHERE id_pmb!='0' ORDER BY npm ASC")->result_array();
        } else {
            $mhs = $this->db->query("SELECT id_pmb as id_mhs, 
				npm as id_mahasiswa_pt,
				nama as nm_pd, 
				alamat, telp as no_hp, email 
				FROM t_anggota 
				WHERE id_pmb='".$id."'
				")->row_array();
        }

        if ($mhs) {
            $this->response($mhs, 200);
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
            $query = $this->mydb->del(['id_mhs' => $id], 't_anggota');
            if ($query) {
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
        date_default_timezone_set('Asia/Jakarta');
        $time = date("Y-m-d H:i:s");
        $data = [
            'username' => $this->post('npm'),
            'password' => password_hash($this->post('npm'), PASSWORD_DEFAULT),
            'level' => '4',
            'npm' => $this->post('npm'),
            'nama' => $this->post('nama'),
            'alamat' => NULL,
            'telp' => NULL,
            'email' => NULL,
            'picture' => '1.jpg',
            'id_jabatan' => NULL,
            'created_at' => $time,
            'update_at' => $time,
            'is_active' => '1'
        ];

        $query = $this->mydb->input_dt($data, 't_anggota');
        if (!$query) {
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
        date_default_timezone_set('Asia/Jakarta');
        $time = date("Y-m-d H:i:s");
        $data = [
            'password' => password_hash($this->put('password'), PASSWORD_DEFAULT),
            'nama' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'telp' => $this->put('telp'),
            'email' => $this->put('email'),
            'update_at' => $time
        ];
        $where = ['id_mhs' => $id];
        $query = $this->mydb->update_dt($where, $data, 't_anggota');
        if (!$query) {
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
