<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Frontend_home extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('destinasi_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $data['daftarDestinasi'] = $this->destinasi_model->getSemuaDestinasi();
        $this->load->view('home', $data);
    }
}

?>