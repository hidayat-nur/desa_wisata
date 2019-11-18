<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Destinasi_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Destinasi_model extends CI_Model
{
    function getJumlahDestinasi($searchText = '')
    {
        $this->db->select('id, nama, deskripsi, foto, harga_tiket');
        $this->db->from('destinasi');

        if(!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%".$searchText."%'
                            OR  deskripsi  LIKE '%".$searchText."%'
                            OR  harga_tiket  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $query = $this->db->get();
        
        return $query->num_rows();
    }

    function getDaftarDestinasi($searchText = '', $page, $segment)
    {
        $this->db->select('id, nama, deskripsi, foto, harga_tiket');
        $this->db->from('destinasi');

        if(!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%".$searchText."%'
                            OR  deskripsi  LIKE '%".$searchText."%'
                            OR  harga_tiket  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->order_by('id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function getSemuaDestinasi()
    {
        $this->db->select('*');
        $this->db->from('destinasi');

        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function tambahDestinasi($data)
    {
        $this->db->trans_start();
        $this->db->insert('destinasi', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function getDestinasiById($id)
    {
        $this->db->select('*');
        $this->db->from('destinasi');
        $this->db->where("id =", $id);

        $query = $this->db->get();
        return $query->row();
    }

    function editDestinasiById($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('destinasi', $data);
        
        return TRUE;
    }

    function hapusById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('destinasi');
        
        return TRUE;
    }
}

  