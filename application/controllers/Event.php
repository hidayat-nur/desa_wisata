<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Destinasi (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Event extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('event_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Desa Wisata : Events';
        
        $this->loadViews("backend/event", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function daftarEvents()
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->event_model->getJumlahEvents($searchText);

			$returns = $this->paginationCompress ( "daftarEvents/", $count, 10 );
            
            $data['daftarEvents'] = $this->event_model->getDaftarEvent($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Desa Wisata : Events';
            
            $this->loadViews("backend/event", $this->global, $data, NULL);
        }
    }

    function tambahEvent()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
            $this->global['pageTitle'] = 'Desa Wisata : Tambah Event';

            $this->loadViews("backend/tambahEvent", $this->global, Null, NULL);
        }
    }

    function tambahEventProses()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $config['upload_path']          = './assets/gambar/events';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')){
                $this->session->set_flashdata('error', $this->upload->display_errors());

                $this->tambahEvent();
            } else {
                $this->load->library('form_validation');
            
                $this->form_validation->set_rules('nama','Nama','required');
                $this->form_validation->set_rules('deskripsi','Deskripsi','required');
                $this->form_validation->set_rules('tgl_acara','Tanggal Acara','required');
                
                if($this->form_validation->run() == FALSE) {
                    $this->tambahEvent();
                } else {
                    $dataInput = array(
                        'nama'=> $this->input->post('nama'),
                        'deskripsi'=> $this->input->post('deskripsi'),
                        'foto'=> $this->upload->data('file_name'),
                        'tgl_acara'=> $this->input->post('tgl_acara')
                    );

                    $result = $this->event_model->tambahEvent($dataInput);
                    
                    if($result > 0) {
                        redirect('daftarEvents');
                    } else {
                        $this->session->set_flashdata('error', 'Data gagal ditambah');
                        $this->tambahEvent();
                    }
                }
            }
        }
    }

    function editEvent($id)
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['daftarEvent'] = $this->event_model->getEventById($id);

            $this->global['pageTitle'] = 'Desa Wisata : Edit Event';

            $this->loadViews("backend/editEvent", $this->global, $data, NULL);
        }
    }

    function editEventProses($id)
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            if (empty($_FILES['foto']['name'])) {
                $this->load->library('form_validation');
            
                $this->form_validation->set_rules('nama','Nama','required');
                $this->form_validation->set_rules('deskripsi','Deskripsi','required');
                $this->form_validation->set_rules('tgl_acara','Tanggal Acara','required');

                if($this->form_validation->run() == FALSE) {
                    $this->tambahEvent();
                } else {
                    $dataInput = array(
                        'nama'=> $this->input->post('nama'),
                        'deskripsi'=> $this->input->post('deskripsi'),
                        'tgl_acara'=> $this->input->post('tgl_acara')
                    );

                    $this->event_model->editEventById($dataInput, $id);
                    
                    redirect('daftarEvents');
                }
            } else {
                $data_lama = $this->event_model->getEventById($id);

                $config['upload_path']          = './assets/gambar/events';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')){
                    $this->session->set_flashdata('error', $this->upload->display_errors());

                    $this->editEvent();
                } else {
                    unlink('./assets/gambar/events/'.$data_lama->foto.'');

                    $this->load->library('form_validation');
                
                    $this->form_validation->set_rules('nama','Nama','required');
                    $this->form_validation->set_rules('deskripsi','Deskripsi','required');
                    $this->form_validation->set_rules('tgl_acara','Tanggal Acara','required');
                    
                    if($this->form_validation->run() == FALSE) {
                        $this->tambahEvent();
                    } else {
                        $dataInput = array(
                            'nama'=> $this->input->post('nama'),
                            'deskripsi'=> $this->input->post('deskripsi'),
                            'foto'=> $this->upload->data('file_name'),
                            'tgl_acara'=> $this->input->post('tgl_acara')
                        );

                        $this->event_model->editEventById($dataInput, $id);
                        
                        redirect('daftarEvents');
                    }
                }
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