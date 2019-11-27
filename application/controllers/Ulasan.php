<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Destinasi (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Ulasan extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ulasan_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Desa Wisata : Ulasan';
        
        $this->loadViews("backend/ulasan", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function daftarUlasan()
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->ulasan_model->getJumlahUlasan($searchText);

			$returns = $this->paginationCompress ( "daftarUlasan/", $count, 10 );
            
            $data['daftarUlasan'] = $this->ulasan_model->getDaftarUlasan($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Desa Wisata : Ulasan';
            
            $this->loadViews("backend/ulasan", $this->global, $data, NULL);
        }
    }

    function tambahUlasan()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
            $this->global['pageTitle'] = 'Desa Wisata : Tambah Ulasan';

            $this->loadViews("backend/tambahUlasan", $this->global, Null, NULL);
        }
    }

    function tambahUlasanProses()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('ulasan','Ulasan','required');
            
            if($this->form_validation->run() == FALSE) {
                $this->tambahUlasan();
            } else {
                $dataInput = array(
                    'nama'=> $this->input->post('nama'),
                    'ulasan'=> $this->input->post('ulasan')
                );

                $result = $this->ulasan_model->tambahUlasan($dataInput);
                
                if($result > 0) {
                    redirect('daftarUlasan');
                } else {
                    $this->session->set_flashdata('error', 'Data gagal ditambah');
                    $this->tambahUlasan();
                }
            }
        }
    }

    function editUlasan($id)
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['daftarUlasan'] = $this->ulasan_model->getUlasanById($id);

            $this->global['pageTitle'] = 'Desa Wisata : Edit Ulasan';

            $this->loadViews("backend/editUlasan", $this->global, $data, NULL);
        }
    }

    function editUlasanProses($id)
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('ulasan','Ulasan','required');

            if($this->form_validation->run() == FALSE) {
                $this->tambahUlasan();
            } else {
                $dataInput = array(
                    'nama'=> $this->input->post('nama'),
                    'ulasan'=> $this->input->post('ulasan')
                );

                $this->ulasan_model->editUlasanById($dataInput, $id);
                
                redirect('daftarUlasan');
            }
        }
    }

    function hapusUlasan($id)
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->ulasan_model->hapusById($id);

            redirect('daftarUlasan');
        }
    }
    
    
    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        
        $this->loadViews("backend/404", $this->global, NULL, NULL);
    }
}

?>