<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Destinasi_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Ulasan_model extends CI_Model
{
    function getJumlahUlasan($searchText = '')
    {
        $this->db->select('id_ulasan, nama, ulasan');
        $this->db->from('ulasan');

        if(!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%".$searchText."%'
                            OR  ulasan  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $query = $this->db->get();
        
        return $query->num_rows();
    }

    function getDaftarUlasan($searchText = '', $page, $segment)
    {
        $this->db->select('id_ulasan, nama, ulasan');
        $this->db->from('ulasan');

        if(!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%".$searchText."%'
                            OR  ulasan  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->order_by('id_ulasan', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function getSemuaUlasan()
    {
        $this->db->select('*');
        $this->db->from('ulasan');

        $this->db->order_by('id_ulasan', 'DESC');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function tambahUlasan($data)
    {
        $this->db->trans_start();
        $this->db->insert('ulasan', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function getUlasanById($id)
    {
        $this->db->select('*');
        $this->db->from('ulasan');
        $this->db->where("id_ulasan =", $id);

        $query = $this->db->get();
        return $query->row();
    }

    function editUlasanById($data, $id)
    {
        $this->db->where('id_ulasan', $id);
        $this->db->update('ulasan', $data);
        
        return TRUE;
    }

    function hapusById($id)
    {
        $this->db->where('id_ulasan', $id);
        $this->db->delete('ulasan');
        
        return TRUE;
    }
}

  