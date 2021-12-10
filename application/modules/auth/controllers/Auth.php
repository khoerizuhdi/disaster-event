<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
    public function index()
    {
        if ($this->session->userdata('is_login') == true) {
            redirect(base_url());
        } else {
            $this->load->view('index');
        }
    }

    public function login_proses()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('index');
        } else {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $user = $this->db->get()->row();

            if ($user) {
                $this->session->set_userdata('is_login', true);
                $this->session->set_userdata('name', $user->nama);

                $this->session->set_flashdata('success', 'Sign In Berhasil');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('failed', 'Email/Password Salah!');
                redirect('login');
            }
        }
    }

    public function logout_proses()
    {
        $this->session->set_userdata('is_login', false);

        $this->session->set_flashdata('success', 'Sign Out Berhasil');
        redirect(base_url());
    }
}
