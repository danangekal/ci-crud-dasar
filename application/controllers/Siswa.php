<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('siswa_model'));
    }

	public function index()
	{
		$data['list'] = $this->siswa_model->get_data();
		$this->load->view('list_siswa', $data);
	}

	public function add_siswa(){
		$data['siswa'] = array(
			'id' 	=> set_value('id'),
			'nama' 	=> set_value('nama'),
			'kelas' => set_value('kelas'),		
		);	

		$this->load->view('form_siswa', $data);
	}

	public function simpan_siswa()
	{
		$this->form_validation->set_rules("nama", "Nama Siswa", "trim|required");
        $this->form_validation->set_rules("kelas", "Kelas", "trim|required");	

        $nama   = $this->input->post("nama", true);
        $kelas  = $this->input->post("kelas", true);

        if ($this->form_validation->run() == false) {
        	$hasil = array(
                'msg'  => "Data belum komplit"
            );
            $this->session->set_flashdata($hasil);
            $this->add_siswa();
        } else {
        	$data = array(
                'nama'  => $nama,
                'kelas' => $kelas,
            );

        	$insert = $this->siswa_model->insert_data($data);

        	if ($insert) {
        		$hasil = array(
	                'msg'  => "Data berhasil disimpan"
	            );
	            $this->session->set_flashdata($hasil);
	            redirect('siswa');
        	} else {
	       		$hasil = array(
	                'msg'  => "Data gagal disimpan"
	            );
	            $this->session->set_flashdata($hasil);
	            redirect('siswa');
        	}

        }
	} 

	public function edit_siswa($id = '')
	{	
    	if (!$id) {
            echo 'Data tidak ditemukan...';
        } else {
        	$cek = $this->siswa_model->get_id($id);

            if (!$cek) {
            	echo 'data tidak ada...';
            } else {
            	$data['siswa'] = $cek;
                $this->load->view('form_siswa', $data);
            }	
        }	
    }

    public function update_siswa(){
		$this->form_validation->set_rules("nama", "Nama Siswa", "trim|required");
        $this->form_validation->set_rules("kelas", "Kelas", "trim|required");	

        $id   = $this->input->post("id", true);
        $nama   = $this->input->post("nama", true);
        $kelas  = $this->input->post("kelas", true);

        if ($this->form_validation->run() == false) {
        	$hasil = array(
                'msg'  => "Data belum komplit"
            );
            $this->session->set_flashdata($hasil);
            $this->edit_siswa($id);
        } else {
        	$data = array(
                'nama'  => $nama,
                'kelas' => $kelas,
            );

        	$update = $this->siswa_model->update_data($data, $id);

        	if ($update) {
        		$hasil = array(
	                'msg'  => "Data berhasil diubah"
	            );
	            $this->session->set_flashdata($hasil);
	            redirect('siswa');
        	} else {
	       		$hasil = array(
	                'msg'  => "Data gagal disimpan"
	            );
	            $this->session->set_flashdata($hasil);
	            redirect('siswa');
        	}

        }
	} 	

	public function delete_siswa($id)
	{
		$delete = $this->siswa_model->delete_data($id);

		if ($delete) {
			$hasil = array(
                'msg'  => "Data berhasil dihapus"
            );
            $this->session->set_flashdata($hasil);
            redirect('siswa');
		} else {
			$hasil = array(
                'msg'  => "Data gagal dihapus"
            );
            $this->session->set_flashdata($hasil);
            redirect('siswa');
		}
	}

}
