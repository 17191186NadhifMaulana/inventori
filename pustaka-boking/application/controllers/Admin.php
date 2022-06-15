<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        $this->load->model('ModelBuku');
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $where = $this->session->userdata('email');
        $data['user'] = $this->db->query("SELECT * FROM user WHERE email='$where'")->row_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();

        // var_dump($data['user']);
        // die();
        

        // var_dump($where);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
