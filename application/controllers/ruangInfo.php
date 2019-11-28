<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Destinasi (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class RuangInfo extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ruanginfo_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Desa Wisata : Ruang Info';
        
        $this->loadViews("backend/ruanginfo", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function daftarRuangInfo()
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->ruanginfo_model->getJumlahRuangInfo($searchText);

            $returns = $this->paginationCompress ( "daftarRuangInfo/", $count, 10 );
            
            $data['daftarRuangInfo'] = $this->ruanginfo_model->getDaftarRuangInfo($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Desa Wisata : Ruang Info';
            
            $this->loadViews("backend/ruanginfo", $this->global, $data, NULL);
        }
    }

    function editRuangInfo($id)
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['daftarRuangInfo'] = $this->ruanginfo_model->getRuangInfoById($id);

            $this->global['pageTitle'] = 'Desa Wisata : Edit Ruang Info';

            $this->loadViews("backend/editRuangInfo", $this->global, $data, NULL);
        }
    }

    function editRuangInfoProses($id)
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            
            $this->load->library('form_validation');
        
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('deskripsi','Deskripsi','required');

            if($this->form_validation->run() == FALSE) {
                $this->editRuangInfo();
            } else {
                $dataInput = array(
                    'nama'=> $this->input->post('nama'),
                    'deskripsi'=> $this->input->post('deskripsi')
                );

                $this->ruanginfo_model->editRuangInfoById($dataInput, $id);
                
                redirect('daftarRuangInfo');
            }
        }
    }

    function hapusEvent($id)
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data_lama = $this->event_model->getEventById($id);
            unlink('./assets/gambar/events/'.$data_lama->foto.'');

            $this->event_model->hapusById($id);

            redirect('daftarEvents');
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