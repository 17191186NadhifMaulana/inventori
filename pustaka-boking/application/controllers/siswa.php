<?php
class siswa extends CI_Controller
{
    public function index()
    {
        $this->load->view('view-form-input');
    }
    public function cetak()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|min_length[2]', [
            'required' =>'Nama Siswa Harus Diisi',
            'min_length' =>'Nama Terlalu Pendek'
            ]);
            $this->form_validation->set_rules('nis','nis','required|min_length[2]',[
            'required' =>'NIS Harus Diisi',
            'min_length' =>'NIS Terlalu Pendek'
            ]);
            if ($this->form_validation->run() != true) {
            $this->load->view('view-form-input');
            } else {
            $data = [
            'nama' => $this->input->post('nama'),
            'nis' => $this->input->post('nis'),
            'kelas' => $this->input->post('kelas'),
            'tanggal' => $this->input->post('tanggal'),
            'tempat' => $this->input->post('tempat'),
            'alamat' => $this->input->post('alamat'),
            'gender' => $this->input->post('gender'),
            'agama' => $this->input->post('agama'),
            ];
            $this->load->view('view-data-siswa', $data);
            }
            }
         }


