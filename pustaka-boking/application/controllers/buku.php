<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Buku extends CI_Controller
{
    public function construct()
   {
        parent :: __construct();
        cek_login();
    }
    // manajemen kategori
    public function kategori()
   {
        $data['judul']='Kategori Buku';// judul tab
        $data['user']=$this->ModelUser->cekData(['email'=>$this->session->userdata('email')])->row_array();
        $data['kategori']=$this->ModelBuku->getKategori()->result_array();// atas,cek data jika sudah login
        $this->form_validation->set_rules('kategori','Kategori','required',[// validasi kategori
            'required'=>'Nama Kategori harus diisi'
        ]);
    if ($this->form_validation->run() == false) { // jika tidak run
       $this->load->view('templates/header',$data);
       $this->load->view('templates/sidebar',$data);
       $this->load->view('templates/topbar',$data);
       $this->load->view('buku/kategori',$data);
       $this->load->view('templates/footer');
    }else{
       $data=[// jika kategori benar
           'kategori'=>$this->input->post('kategori',TRUE)
       ];// simpan ke db
       $this->ModelBuku->simpanKategori($data);
       redirect('buku/kategori');
    }
}
       public function ubahKategori()
{
    $data['judul'] = 'Ubah Data Kategori';
    $data['user']=$this->ModelUser->cekData(['email'=>$this->session->userdata('email')])->row_array();
    $data['kategori']=$this->ModelBuku->getkategori()->result_array();
    $this->form_validation->set_rules('kategori','Nama Kategori','required|min_length[3]',['required'=>'Nama Kategori harus diisi',
'min_length'=>'Nama Kategori terlalu pendek' ]);
  
if ($this->form_validation->run() == false) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('buku/ubah_kategori',$data);
        $this->load->view('templates/footer');
    }else{
        $data=[
            'kategori'=> $this->input->post('kategori',true)
        ];
        $this->ModelBuku->simpankategori($data);
        redirect('buku/kategori');
    }
}
    public function hapuskategori()
    {
        $where = ['id_kategori' => $this->uri->segment(3)];
        $this->modelbuku->hapuskategori($where);
        redirect('buku/kategori')
    }

}