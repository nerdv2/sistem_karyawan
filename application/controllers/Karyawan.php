<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KaryawanModel');
        $this->load->model('DataMaster');
    }

	public function index()
	{
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $data['query'] = $this->KaryawanModel->getData();
            $this->load->view('karyawan/karyawan_view', $data);
        } else {
            redirect('/');
        }
    }

    public function add()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $data['statuskaryawan']    = $this->DataMaster->getDataStatuskaryawan();
            $data['jabatan']    = $this->DataMaster->getDataJabatan();
            $data['agama']    = $this->DataMaster->getDataAgama();
            $data['pendidikanterakhir']    = $this->DataMaster->getDataPendidikanterakhir();
            $data['statuskawin']    = $this->DataMaster->getDataStatuskawin();

            $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
            $this->form_validation->set_rules('status_kawin', 'Status Kawin', 'trim|required');
            $this->form_validation->set_rules('jumlah_anak', 'Jumlah Anak', 'trim|required');
            $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'trim|required');
            $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
            $this->form_validation->set_rules('status_karyawan', 'Status Karyawan', 'trim|required');
            $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
            $this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'trim');
            $this->form_validation->set_rules('alamat_sekarang', 'Alamat Sekarang', 'trim|required');
            $this->form_validation->set_rules('no_telp', 'Telepon', 'trim');
            $this->form_validation->set_rules('no_ktp', 'No. KTP', 'trim');
            $this->form_validation->set_rules('no_npwp', 'No. NPWP', 'trim');
            $this->form_validation->set_rules('no_bpjs_kes', 'No. BPJS Kesehatan', 'trim');
            $this->form_validation->set_rules('no_bpjs_kerja', 'No. BPJS Ketenagakerjaan', 'trim');
            $this->form_validation->set_rules('email', 'Email', 'trim');
            $this->form_validation->set_rules('mulai_kerja', 'Mulai Kerja', 'trim');
            $this->form_validation->set_rules('sk_kontrak', 'S.K Kontrak', 'trim');
            $this->form_validation->set_rules('sk_karyawan', 'S.K Karyawan', 'trim');

            if ($this->form_validation->run() === false) {
                $this->load->view('karyawan/karyawan_add', $data);
            } else {
                if ($this->KaryawanModel->addData()) {
                    $this->index();
                } else {
                    $this->load->view('karyawan/karyawan_add', $data);
                }
            }
        } else {
            redirect('/');
        }
    }

    public function detail($id)
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

        } else {
            redirect('/');
        }
    }

    public function edit($id)
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $data['statuskaryawan']    = $this->DataMaster->getDataStatuskaryawan();
            $data['jabatan']    = $this->DataMaster->getDataJabatan();
            $data['agama']    = $this->DataMaster->getDataAgama();
            $data['pendidikanterakhir']    = $this->DataMaster->getDataPendidikanterakhir();
            $data['statuskawin']    = $this->DataMaster->getDataStatuskawin();

            $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
            $this->form_validation->set_rules('status_kawin', 'Status Kawin', 'trim|required');
            $this->form_validation->set_rules('jumlah_anak', 'Jumlah Anak', 'trim|required');
            $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'trim|required');
            $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
            $this->form_validation->set_rules('status_karyawan', 'Status Karyawan', 'trim|required');
            $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
            $this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'trim');
            $this->form_validation->set_rules('alamat_sekarang', 'Alamat Sekarang', 'trim|required');
            $this->form_validation->set_rules('no_telp', 'Telepon', 'trim');
            $this->form_validation->set_rules('no_ktp', 'No. KTP', 'trim');
            $this->form_validation->set_rules('no_npwp', 'No. NPWP', 'trim');
            $this->form_validation->set_rules('no_bpjs_kes', 'No. BPJS Kesehatan', 'trim');
            $this->form_validation->set_rules('no_bpjs_kerja', 'No. BPJS Ketenagakerjaan', 'trim');
            $this->form_validation->set_rules('email', 'Email', 'trim');
            $this->form_validation->set_rules('mulai_kerja', 'Mulai Kerja', 'trim');
            $this->form_validation->set_rules('sk_kontrak', 'S.K Kontrak', 'trim');
            $this->form_validation->set_rules('sk_karyawan', 'S.K Karyawan', 'trim');

            if ($this->form_validation->run() === false) {
                $data['query'] = $this->KaryawanModel->readSpecific($id);
                $this->load->view('karyawan/karyawan_edit', $data);
            } else {
                if ($this->KaryawanModel->editData($id)) {
                    $this->index();
                } else {
                    $data['query'] = $this->KaryawanModel->readSpecific($id);
                    $this->load->view('karyawan/karyawan_edit', $data);
                }
            }
        } else {
            redirect('/');
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->KaryawanModel->deleteData($id);
            $this->index();
        } else {
            redirect('/');
        }
    }
}