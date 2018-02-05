<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{

    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /**
     * resolve_user_login function.
     *
     * @access public
     * @param mixed $username
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function resolve_user_login($username, $password)
    {
        $this->db->select('password_hash');
        $this->db->from('users');
        $this->db->where('username', $username);
        $hash = $this->db->get()->row('password_hash');
        
        return $this->verify_password_hash($password, $hash);
    }
    
    /**
     * get_user_id_from_username function.
     *
     * @access public
     * @param mixed $username
     * @return int the user id
     */
    public function get_user_id_from_username($username)
    {
        $this->db->select('id_user');
        $this->db->from('users');
        $this->db->where('username', $username);

        return $this->db->get()->row('id_user');
    }
    
    /**
     * get_user function.
     *
     * @access public
     * @param mixed $user_id
     * @return object the user object
     */
    public function get_user($user_id)
    {
        $this->db->from('users');
        $this->db->where('id_user', $user_id);
        return $this->db->get()->row();
    }
    
    /**
     * hash_password function.
     *
     * @access private
     * @param mixed $password
     * @return string|bool could be a string on success, or bool false on failure
     */
    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    
    /**
     * verify_password_hash function.
     *
     * @access private
     * @param mixed $password
     * @param mixed $hash
     * @return bool
     */
    private function verify_password_hash($password, $hash)
    {
        return password_verify($password, $hash);
    }

    public function getUserData()
    {
        $this->db->select("*");
        $this->db->from('users');
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

    public function addUser()
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');

        $data = array(
            'username'   => $username,
            'password_hash'   => $this->hash_password($password),
            'status'      => 0,
            'created_at' => date('Y-m-j H:i:s'),
            'updated_at' => date('Y-m-j H:i:s'),
        );
        
        return $this->db->insert('users', $data);
    }

    public function editUser($id)
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');

        $data = array(
            'username'   => $username,
            'password_hash'   => $this->hash_password($password),
            'status'      => 0,
            'updated_at' => date('Y-m-j H:i:s'),
        );
        
        $this->db->where("id_user", $id);
        $this->db->update("users", $data);
        $this->Redirect();
    }

    public function changePass($id)
    {
        $old_password   = $this->input->post('old_password');
        $new_password   = $this->input->post('new_password');

        $this->db->select('password_hash');
        $this->db->from('users');
        $this->db->where('id_user', $id);
        $hash = $this->db->get()->row('password_hash');

        $check = $this->verify_password_hash($old_password, $hash);

        if ($check == true) {
            $data = array(
                'password_hash'   => $this->hash_password($new_password),
                'updated_at' => date('Y-m-j H:i:s'),
            );
            
            $this->db->where("id_user", $id);
            $this->db->update("users", $data);
            $this->Redirect();
        } else {
            $this->Redirect();
        }
    }

    public function deleteUser($id)
    {
        $data['id_user'] = $id;
        $this->db->where($data);
        $this->db->delete('users');
    }

    public function record_login($status, $username)
    {
        if ($status == 0) {
            $message    = "Login authentication success.";
            $additional_info = array("username"=>$username,
                                    "ip_address"=>$_SERVER['REMOTE_ADDR'],
                                    "browser"=>$_SERVER['HTTP_USER_AGENT'],
                                    "fallback_ip_address"=>$_SERVER["REMOTE_HOST"] ?: gethostbyaddr($_SERVER["REMOTE_ADDR"]));

            $additional_info = json_encode($additional_info);

            $data = array(
                'level'  => 'info',
                'message' => $message,
                'additional_info' => $additional_info,
                'created_at' => date('Y-m-j H:i:s')
            );

            return $this->db->insert('log', $data);
        } else if ($status == 1) {
            $message    = "Login authentication failed.";
            $additional_info = array("username"=>$username,
                                    "ip_address"=>$_SERVER['REMOTE_ADDR'],
                                    "browser"=>$_SERVER['HTTP_USER_AGENT'],
                                    "fallback_ip_address"=>$_SERVER["REMOTE_HOST"] ?: gethostbyaddr($_SERVER["REMOTE_ADDR"]));

            $additional_info = json_encode($additional_info);

            $data = array(
                'level'  => 'info',
                'message' => $message,
                'additional_info' => $additional_info,
                'created_at' => date('Y-m-j H:i:s')
            );

            return $this->db->insert('log', $data);
        }
    }
}