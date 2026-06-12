<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user')) {
            redirect('auth', 'refresh');
        }

        $this->load->model('ProdiModel');
        $this->load->model('FakultasModel');
    }

    public function index()
    {
        $data['prodi'] = $this->ProdiModel->getAll();

        $header['title'] = 'Program Studi';
        $this->load->view('layout/header', $header);
        $this->load->view('prodi/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        if ($this->input->post()) {

            $this->form_validation->set_rules('prodi_name', 'Nama Prodi', 'required|min_length[3]|max_length[100]');
            $this->form_validation->set_rules('prodi_strata', 'Strata', 'required');
            $this->form_validation->set_rules('fakultas_id', 'Fakultas', 'required');

            if ($this->form_validation->run() === TRUE) {

                $data = [
                    'prodi_name'   => $this->input->post('prodi_name'),
                    'prodi_strata' => $this->input->post('prodi_strata'),
                    'fakultas_id'  => $this->input->post('fakultas_id'),
                ];

                $this->ProdiModel->insert($data);

                $this->session->set_flashdata('swal', [
                    'icon'  => 'success',
                    'title' => 'Berhasil!',
                    'text'  => 'Data prodi berhasil ditambahkan.'
                ]);

                redirect('prodi');
            }
        }

        $data['prodi']    = null;
        $data['fakultas'] = $this->FakultasModel->getAll();
        $data['action']   = base_url('prodi/tambah');
        $data['button']   = 'Simpan';

        $header['title'] = 'Tambah Program Studi';
        $this->load->view('layout/header', $header);
        $this->load->view('prodi/form', $data);
        $this->load->view('layout/footer');
    }

    public function ubah($id)
    {
        $prodi = $this->ProdiModel->getById($id);

        if (!$prodi) {
            $this->session->set_flashdata('swal', [
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data prodi tidak ditemukan.'
            ]);
            redirect('prodi');
        }

        if ($this->input->post()) {

            $this->form_validation->set_rules('prodi_name', 'Nama Prodi', 'required|min_length[3]|max_length[100]');
            $this->form_validation->set_rules('prodi_strata', 'Strata', 'required');
            $this->form_validation->set_rules('fakultas_id', 'Fakultas', 'required');

            if ($this->form_validation->run() === TRUE) {

                $data = [
                    'prodi_name'   => $this->input->post('prodi_name'),
                    'prodi_strata' => $this->input->post('prodi_strata'),
                    'fakultas_id'  => $this->input->post('fakultas_id'),
                ];

                $this->ProdiModel->update($id, $data);

                $this->session->set_flashdata('swal', [
                    'icon'  => 'success',
                    'title' => 'Berhasil!',
                    'text'  => 'Data prodi berhasil diubah.'
                ]);

                redirect('prodi');
            }

            $prodi = $this->input->post();
        }

        $data['prodi']    = $prodi;
        $data['fakultas'] = $this->FakultasModel->getAll();
        $data['action']   = base_url('prodi/ubah/' . $id);
        $data['button']   = 'Update';

        $header['title'] = 'Ubah Program Studi';
        $this->load->view('layout/header', $header);
        $this->load->view('prodi/form', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($id)
    {
        $prodi = $this->ProdiModel->getById($id);

        if (!$prodi) {
            $this->session->set_flashdata('swal', [
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data prodi tidak ditemukan.'
            ]);
            redirect('prodi');
        }

        $this->ProdiModel->delete($id);

        $this->session->set_flashdata('swal', [
            'icon'  => 'warning',
            'title' => 'Dihapus!',
            'text'  => 'Data prodi berhasil dihapus.'
        ]);

        redirect('prodi');
    }
}