<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Destinasi (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Destinasi extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('destinasi_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Desa Wisata : Destinasi';
        
        $this->loadViews("backend/destinasi", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function daftarDestinasi()
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->destinasi_model->getJumlahDestinasi($searchText);

			$returns = $this->paginationCompress ( "daftarDestinasi/", $count, 10 );
            
            $data['daftarDestinasi'] = $this->destinasi_model->getDaftarDestinasi($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Desa Wisata : Destinasi';
            
            $this->loadViews("backend/destinasi", $this->global, $data, NULL);
        }
    }

    function tambahDestinasi()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
            $this->global['pageTitle'] = 'Desa Wisata : Tambah Destinasi';

            $this->loadViews("backend/tambahDestinasi", $this->global, Null, NULL);
        }
    }

    function tambahDestinasiProses()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $config['upload_path']          = './assets/gambar/destinasi';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')){
                $this->session->set_flashdata('error', $this->upload->display_errors());

                $this->tambahDestinasi();
            } else {
                $this->load->library('form_validation');
            
                $this->form_validation->set_rules('nama','Nama','required');
                $this->form_validation->set_rules('deskripsi','Deskripsi','required');
                $this->form_validation->set_rules('harga','Harga','required');
                
                if($this->form_validation->run() == FALSE) {
                    $this->tambahDestinasi();
                } else {
                    $dataInput = array(
                        'nama'=> $this->input->post('nama'),
                        'deskripsi'=> $this->input->post('deskripsi'),
                        'foto'=> $this->upload->data('file_name'),
                        'harga_tiket'=> $this->input->post('harga')
                    );

                    $result = $this->destinasi_model->tambahDestinasi($dataInput);
                    
                    if($result > 0) {
                        redirect('daftarDestinasi');
                    } else {
                        $this->session->set_flashdata('error', 'Data gagal ditambah');
                        $this->tambahDestinasi();
                    }
                }
            }
        }
    }

    function editDestinasi($id)
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['daftarDestinasi'] = $this->destinasi_model->getDestinasiById($id);

            $this->global['pageTitle'] = 'Desa Wisata : Tambah Destinasi';

            $this->loadViews("backend/editDestinasi", $this->global, $data, NULL);
        }
    }

    function editDestinasiProses($id)
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            if (empty($_FILES['foto']['name'])) {
                $this->load->library('form_validation');
            
                $this->form_validation->set_rules('nama','Nama','required');
                $this->form_validation->set_rules('deskripsi','Deskripsi','required');
                $this->form_validation->set_rules('harga','Harga','required');

                if($this->form_validation->run() == FALSE) {
                    $this->tambahDestinasi();
                } else {
                    $dataInput = array(
                        'nama'=> $this->input->post('nama'),
                        'deskripsi'=> $this->input->post('deskripsi'),
                        'harga_tiket'=> $this->input->post('harga')
                    );

                    $this->destinasi_model->editDestinasiById($dataInput, $id);
                    
                    redirect('daftarDestinasi');
                }
            } else {
                $data_lama = $this->destinasi_model->getDestinasiById($id);

                $config['upload_path']          = './assets/gambar/destinasi';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')){
                    $this->session->set_flashdata('error', $this->upload->display_errors());

                    $this->editDestinasi();
                } else {
                    unlink('./assets/gambar/destinasi/'.$data_lama->foto.'');

                    $this->load->library('form_validation');
                
                    $this->form_validation->set_rules('nama','Nama','required');
                    $this->form_validation->set_rules('deskripsi','Deskripsi','required');
                    $this->form_validation->set_rules('harga','Harga','required');
                    
                    if($this->form_validation->run() == FALSE) {
                        $this->tambahDestinasi();
                    } else {
                        $dataInput = array(
                            'nama'=> $this->input->post('nama'),
                            'deskripsi'=> $this->input->post('deskripsi'),
                            'foto'=> $this->upload->data('file_name'),
                            'harga_tiket'=> $this->input->post('harga')
                        );

                        $this->destinasi_model->editDestinasiById($dataInput, $id);
                        
                        redirect('daftarDestinasi');
                    }
                }
            }
        }
    }

    function hapusDestinasi($id)
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data_lama = $this->destinasi_model->getDestinasiById($id);
            unlink('./assets/gambar/destinasi/'.$data_lama->foto.'');

            $this->destinasi_model->hapusById($id);

            redirect('daftarDestinasi');
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