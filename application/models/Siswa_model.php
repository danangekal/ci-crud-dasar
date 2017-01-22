<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

        public $table = 'siswa';
        public $id = 'id';

        public function get_data()
        {
                return $this->db->get($this->table);
        }

        public function get_id($id)
        {       
                $this->db->where($this->id, $id);        
                return $this->db->get($this->table)->row_array();
        }

        public function insert_data($data)
        {
                return $this->db->insert($this->table, $data);
        }

        public function update_data($data, $id)
        {
                return $this->db->set($data)->where($this->id,$id)->update($this->table);
        }

        public function delete_data($id){
                $this->db->where($this->id, $id);
                return $this->db->delete($this->table);
        }

}
