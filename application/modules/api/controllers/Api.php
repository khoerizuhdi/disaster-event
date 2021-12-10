<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('m_api');
    }

    public function bencana_get($id = 0)
    {
        // ambil semua data bencana dari database
        $bencana = $this->m_api->get_all_bencana()->result();

        if ($id == 0) {
            // Check if the users data store contains users
            if ($bencana) {
                // Set the response and exit
                $this->response($bencana, 200);
            } else {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'No users were found'
                ], 404);
            }
        } else {
            if (array_key_exists($id, $bencana)) {
                $bencana = $this->m_api->get_bencana($id)->result();
                $this->response($bencana, 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'No such user found'
                ], 404);
            }
        }
    }

    public function bencana_post()
    {
        $data_bencana = [
            'judul_bencana' => $this->post('judul_bencana'),
            'jenis_bencana_id' => $this->post('jenis_bencana_id'),
            'latitude' => $this->post('latitude'),
            'longitude' => $this->post('longitude'),
            'deskripsi_bencana' => $this->post('deskripsi_bencana'),
            'photo_bencana' => $this->post('photo_bencana'),
            'tanggal_kejadian' => $this->post('tanggal_kejadian'),
            'alamat' => $this->post('alamat'),
        ];

        // if ($judul_bencana != null && $jenis_bencana_id != null && $latitude != null && $longitude != null && $tanggal_kejadian != null) {
        //     $insert = $this->m_api->add_bencana($data_bencana);
        // }

        $insert = $this->m_api->add_bencana($data_bencana);

        if ($insert == true) {
            $this->response(array('status' => 'Insert Data Success', 'data' => $data_bencana, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    public function bencana_put($id)
    {
        $data_bencana = [
            'judul_bencana' => $this->put('judul_bencana'),
            'jenis_bencana_id' => $this->put('jenis_bencana_id'),
            'latitude' => $this->put('latitude'),
            'longitude' => $this->put('longitude'),
            'deskripsi_bencana' => $this->put('deskripsi_bencana'),
            'photo_bencana' => $this->put('photo_bencana'),
            'tanggal_kejadian' => $this->put('tanggal_kejadian'),
            'alamat' => $this->put('alamat'),
        ];

        $edit = $this->m_api->edit_bencana($id, $data_bencana);

        if ($edit == true) {
            $this->response(array('status' => 'Edit Data Success', 'data' => $data_bencana, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    public function bencana_delete($id)
    {
        $delete = $this->m_api->delete_bencana($id);

        if ($delete == true) {
            $this->response(array('status' => 'Delete Data Success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
