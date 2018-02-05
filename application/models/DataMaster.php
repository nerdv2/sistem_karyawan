<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMaster extends CI_Model
{
    public function getDataStatuskaryawan()
    {
        $data = array();
        $query = $this->db->get('statuskaryawan');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

    public function getDataJabatan()
    {
        $data = array();
        $query = $this->db->get('jabatan');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

    public function getDataAgama()
    {
        $data = array();
        $query = $this->db->get('agama');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

    public function getDataPendidikanterakhir()
    {
        $data = array();
        $query = $this->db->get('pendidikanterakhir');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

    public function getDataStatuskawin()
    {
        $data = array();
        $query = $this->db->get('statuskawin');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }
}