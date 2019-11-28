<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Destinasi_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class RuangInfo_model extends CI_Model
{
    function getJumlahRuangInfo($searchText = '')
    {
        $this->db->select('id_ruang_info, nama, deskripsi');
        $this->db->from('ruang_info');

        if(!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%".$searchText."%'
                            OR  deskripsi  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $query = $this->db->get();
        
        return $query->num_rows();
    }

    function getDaftarRuangInfo($searchText = '', $page, $segment)
    {
        $this->db->select('id_ruang_info, nama, deskripsi');
        $this->db->from('ruang_info');

        if(!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%".$searchText."%'
                            OR  deskripsi  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->order_by('id_ruang_info', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function getSemuaRuangInfo()
    {
        $this->db->select('*');
        $this->db->from('ruang_info');

        $this->db->order_by('id_ruang_info', 'DESC');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function tambahEvent($data)
    {
        $this->db->trans_start();
        $this->db->insert('events', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function getRuangInfoById($id)
    {
        $this->db->select('*');
        $this->db->from('ruang_info');
        $this->db->where("id_ruang_info =", $id);

        $query = $this->db->get();
        return $query->row();
    }

    function editRuangInfoById($data, $id)
    {
        $this->db->where('id_ruang_info', $id);
        $this->db->update('ruang_info', $data);
        
        return TRUE;
    }

    function hapusById($id)
    {
        $this->db->where('id_event', $id);
        $this->db->delete('events');
        
        return TRUE;
    }
}

  