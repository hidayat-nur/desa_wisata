<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Destinasi_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Event_model extends CI_Model
{
    function getJumlahEvents($searchText = '')
    {
        $this->db->select('id_event, nama, deskripsi, foto, tgl_acara');
        $this->db->from('events');

        if(!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%".$searchText."%'
                            OR  deskripsi  LIKE '%".$searchText."%'
                            OR  foto  LIKE '%".$searchText."%'
                            OR  tgl_acara  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $query = $this->db->get();
        
        return $query->num_rows();
    }

    function getDaftarEvent($searchText = '', $page, $segment)
    {
        $this->db->select('id_event, nama, deskripsi, foto, tgl_acara');
        $this->db->from('events');

        if(!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%".$searchText."%'
                            OR  deskripsi  LIKE '%".$searchText."%'
                            OR  foto  LIKE '%".$searchText."%'
                            OR  tgl_acara  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->order_by('id_event', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function getSemuaEvent()
    {
        $this->db->select('*');
        $this->db->from('events');

        $this->db->order_by('id_event', 'DESC');
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

    function getEventById($id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where("id_event =", $id);

        $query = $this->db->get();
        return $query->row();
    }

    function editEventById($data, $id)
    {
        $this->db->where('id_event', $id);
        $this->db->update('events', $data);
        
        return TRUE;
    }

    function hapusById($id)
    {
        $this->db->where('id_event', $id);
        $this->db->delete('events');
        
        return TRUE;
    }
}

  