<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StatusKawinModel extends CI_Model
{
    public function getData()
    {
        $this->db->select("*");
        $this->db->from('statuskawin');
        $query = $this->db->get();
        $qresult = $query->result();
        if ($query->num_rows() == 0) {
            return $qresult;
        } else {
            foreach ($query->result_array() as $data) {
                $dataall[] = $data;
            }
            
            return $this->arraytoobject($dataall);
        }
        
        //return $qresult;
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
        $this->db->from('statuskawin');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function addData()
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "created_at" => date('Y-m-j H:i:s'),
            "updated_at" => date('Y-m-j H:i:s')
        );

        return $this->db->insert('statuskawin', $data);
    }

    public function editData($id)
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "updated_at" => date('Y-m-j H:i:s')
        );

        $this->db->where("id", $id);
        return $this->db->update("statuskawin", $data);
    }

    public function deleteData($id)
    {
        $data['id'] = $id;
        $this->db->where($data);
        return $this->db->delete('statuskawin');
    }
}