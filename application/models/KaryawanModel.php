<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KaryawanModel extends CI_Model
{
    public function getData()
    {
        $this->db->select("*");
        $this->db->from('karyawan');
        $query = $this->db->get();
        $qresult = $query->result();
        if ($query->num_rows() == 0) {
            return $qresult;
        } else {
            foreach ($query->result_array() as $data) {
                
                $data['nmjabatan'] = $this->getDataDB('nama', 'jabatan', 'id', $data['jabatan']);
                $data['nmstatus'] = $this->getDataDB('nama', 'statuskaryawan', 'id', $data['status_karyawan']);
                
                $dataall[] = $data;
            }
            
            return $this->arraytoobject($dataall);
        }
        
        //return $qresult;
    }

    public function getkaryawan_report(){
        $dataquery = "SELECT * FROM getkaryawanfull";
        $execute = $this->db->query($dataquery);
        return $execute;
    }
    
    public function arraytoobject($array)
    {
        return json_decode(json_encode($array), false);
    }
    
    public function getDataDB($field, $table, $column, $key)
    {
        $this->db->select($field);
        $this->db->from($table);
        $this->db->where($column, $key);
        $query = $this->db->get();
        $data = $query->row();
        return $data->$field;
    }

    public function readSpecific($id)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function addData()
    {
        $data = array(
            "kode" => $this->input->post('kode'),
            "nama" => $this->input->post('nama'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "status_kawin" => $this->input->post('status_kawin'),
            "jumlah_anak" => $this->input->post('jumlah_anak'),
            "pendidikan_terakhir" => $this->input->post('pendidikan_terakhir'),
            "agama" => $this->input->post('agama'),
            "jabatan" => $this->input->post('jabatan'),
            "status_karyawan" => $this->input->post('status_karyawan'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "alamat_asal" => $this->input->post('alamat_asal'),
            "alamat_sekarang" => $this->input->post('alamat_sekarang'),
            "no_telp" => $this->input->post('no_telp'),
            "no_ktp" => $this->input->post('no_ktp'),
            "no_npwp" => $this->input->post('no_npwp'),
            "no_bpjs_kes" => $this->input->post('no_bpjs_kes'),
            "no_bpjs_kerja" => $this->input->post('no_bpjs_kerja'),
            "email" => $this->input->post('email'),
            "mulai_kerja" => $this->input->post('mulai_kerja'),
            "sk_kontrak" => $this->input->post('sk_kontrak'),
            "sk_karyawan" => $this->input->post('sk_karyawan'),
            "created_at" => date('Y-m-j H:i:s'),
            "updated_at" => date('Y-m-j H:i:s')
        );

        return $this->db->insert('karyawan', $data);
    }

    public function editData($id)
    {
        $data = array(
            "kode" => $this->input->post('kode'),
            "nama" => $this->input->post('nama'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "status_kawin" => $this->input->post('status_kawin'),
            "jumlah_anak" => $this->input->post('jumlah_anak'),
            "pendidikan_terakhir" => $this->input->post('pendidikan_terakhir'),
            "agama" => $this->input->post('agama'),
            "jabatan" => $this->input->post('jabatan'),
            "status_karyawan" => $this->input->post('status_karyawan'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "alamat_asal" => $this->input->post('alamat_asal'),
            "alamat_sekarang" => $this->input->post('alamat_sekarang'),
            "no_telp" => $this->input->post('no_telp'),
            "no_ktp" => $this->input->post('no_ktp'),
            "no_npwp" => $this->input->post('no_npwp'),
            "no_bpjs_kes" => $this->input->post('no_bpjs_kes'),
            "no_bpjs_kerja" => $this->input->post('no_bpjs_kerja'),
            "email" => $this->input->post('email'),
            "mulai_kerja" => $this->input->post('mulai_kerja'),
            "sk_kontrak" => $this->input->post('sk_kontrak'),
            "sk_karyawan" => $this->input->post('sk_karyawan'),
            "updated_at" => date('Y-m-j H:i:s')
        );

        $this->db->where("id", $id);
        return $this->db->update("karyawan", $data);
    }

    public function deleteData($id)
    {
        $data['id'] = $id;
        $this->db->where($data);
        return $this->db->delete('karyawan');
    }
}