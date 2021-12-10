<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_bencana');
        $this->load->model('m_bencana_datatables');
    }

    public function index() //menampilkan halaman home
    {
        $data['title'] = 'Peta Bencana | Home';

        $this->load->view('t_navbar', $data);
        $this->load->view('d_index');
        $this->load->view('t_footer');
    }

    public function get_bencana() //menarik data untuk halaman home
    {
        //menggunakan model untuk menarik semua data yg ada di tabel bencana
        $bencana = $this->m_bencana->get_all_bencana()->result();

        //cetak dalam bentuk json
        echo json_encode($bencana);
    }

    public function add_bencana() //nemabah data bencana
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul_bencana', 'Judul', 'required');
        $this->form_validation->set_rules('jenis_bencana_id', 'Jenis bencana', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('tanggal_kejadian', 'Tanggal kejadian', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Peta Bencana | Manajemen Bencana';

            $data['jenis_bencana'] = $this->db->get('jenis_bencana')->result_array();

            $this->load->view('t_navbar', $data);
            $this->load->view('d_management');
            $this->load->view('t_footer');
        } else {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 1024;

            $this->load->library('upload', $config);
            $this->upload->do_upload('photo_bencana');

            $judul_bencana = $this->input->post('judul_bencana');
            $jenis_bencana_id = $this->input->post('jenis_bencana_id');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $deskripsi_bencana = $this->input->post('deskripsi_bencana');
            $photo_bencana = $this->upload->data('file_name');
            $tanggal_kejadian = $this->input->post('tanggal_kejadian');
            $alamat = $this->input->post('alamat');

            $data_bencana = [
                'judul_bencana' => $judul_bencana,
                'jenis_bencana_id' => $jenis_bencana_id,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'deskripsi_bencana' => $deskripsi_bencana,
                'photo_bencana' => $photo_bencana,
                'tanggal_kejadian' => $tanggal_kejadian,
                'alamat' => $alamat,
            ];

            $this->m_bencana->add_bencana($data_bencana);

            $this->session->set_flashdata('success', 'Data berhasil ditambahkan.'); //buat alert
            redirect('management');
        }
    }

    public function delete_bencana($id)
    {
        if ($this->session->userdata('is_login') == true) {
            $this->m_bencana->delete_bencana($id); //delete data di tabel bencana yg memiliki id tertentu

            $this->session->set_flashdata('success', 'Data berhasil dihapus.'); //buat alert
            redirect('management');
        } else {
            redirect(base_url());
        }
    }

    public function edit_bencana($id)
    {
        if ($this->session->userdata('is_login') == true) {
            $data['title'] = 'Peta Bencana | Edit Bencana';

            //menggunakan model untuk menarik data yg ada di tabel bencana berdasarkan id
            $data['bencana'] = $this->m_bencana->get_bencana($id)->row_array();
            //menggunakan model untuk menarik data yg ada di tabel jenis_bencana
            $data['jenis_bencana'] = $this->db->get('jenis_bencana')->result_array();

            // var_dump($data);
            // die();

            $this->load->view('t_navbar', $data);
            $this->load->view('d_management_edit');
            $this->load->view('t_footer');
            //cetak dalam bentuk json
            // echo json_encode($bencana);
        } else {
            redirect(base_url());
        }
    }

    public function edit_bencana_proses($id)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul_bencana', 'Judul', 'required');
        $this->form_validation->set_rules('jenis_bencana_id', 'Jenis bencana', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('tanggal_kejadian', 'Tanggal kejadian', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Peta Bencana | Edit Bencana';

            //menggunakan model untuk menarik data yg ada di tabel bencana berdasarkan id
            $data['bencana'] = $this->m_bencana->get_bencana($id)->row_array();
            //menggunakan model untuk menarik data yg ada di tabel jenis_bencana
            $data['jenis_bencana'] = $this->db->get('jenis_bencana')->result_array();

            $this->load->view('t_navbar', $data);
            $this->load->view('d_management_edit');
            $this->load->view('t_footer');
        } else {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 1024;

            $this->load->library('upload', $config);
            $this->upload->do_upload('photo_bencana');

            $judul_bencana = $this->input->post('judul_bencana');
            $jenis_bencana_id = $this->input->post('jenis_bencana_id');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $deskripsi_bencana = $this->input->post('deskripsi_bencana');
            $tanggal_kejadian = $this->input->post('tanggal_kejadian');
            $alamat = $this->input->post('alamat');

            $data_bencana = [
                'judul_bencana' => $judul_bencana,
                'jenis_bencana_id' => $jenis_bencana_id,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'deskripsi_bencana' => $deskripsi_bencana,
                'tanggal_kejadian' => $tanggal_kejadian,
                'alamat' => $alamat,
            ];

            if ($this->upload->data('file_name') != '') {
                $photo_bencana = $this->upload->data('file_name');
                $data_bencana['photo_bencana'] = $photo_bencana;
            }

            // var_dump($data_bencana, $id);
            // die();

            $this->m_bencana->edit_bencana($id, $data_bencana);

            $this->session->set_flashdata('success', 'Data berhasil diubah.'); //buat alert
            redirect('management');
        }
    }

    public function management() //menampilkan halaman manajemen
    {
        if ($this->session->userdata('is_login') == true) {
            $data['title'] = 'Peta Bencana | Manajemen Bencana';

            $data['jenis_bencana'] = $this->db->get('jenis_bencana')->result_array();

            $this->load->view('t_navbar', $data);
            $this->load->view('d_management');
            $this->load->view('t_footer');
        } else {
            redirect(base_url());
        }
    }

    public function get_bencana_datatables()
    {
        $list = $this->m_bencana_datatables->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->judul_bencana;
            $row[] = $field->jenis_bencana;
            $row[] = $field->latitude;
            $row[] = $field->longitude;
            $row[] = $field->tanggal_kejadian;
            $row[] = '<a href="' . base_url('edit/' . $field->id) . '"class="btn btn-sm btn-primary">Edit</a>' . ' ' . '<a href="' . base_url('delete/' . $field->id) . '"class="btn btn-sm btn-danger">Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_bencana_datatables->count_all(),
            "recordsFiltered" => $this->m_bencana_datatables->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function rest_api() //menampilkan halaman manajemen
    {
        if ($this->session->userdata('is_login') == true) {
            $data['title'] = 'Peta Bencana | REST API';

            $this->load->view('t_navbar', $data);
            $this->load->view('d_rest_api');
            $this->load->view('t_footer');
        } else {
            redirect(base_url());
        }
    }
}
