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
        $this->load->model('event_model');
        $this->load->model('ulasan_model');
        $this->load->model('ruanginfo_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index($offset = 1)
    {
        $limit = 6;
        $offsetConvert = $offset * $limit - $limit;

        // 1 = 0 > 1 * 6 - 6
        // 2 = 6 > 2 * 6 - 6
        // 3 = 12 > 3 * 6 - 6

        $jumlahDestinasi = $this->destinasi_model->getJumlahDestinasi();

        $data['posisiOffset'] = $offset;
        $data['jumlahpagging'] = ceil($jumlahDestinasi / $limit);
        $data['jumlahDestinasi'] = $jumlahDestinasi;
        $data['daftarDestinasi'] = $this->destinasi_model->getDaftarDestinasi('', $limit, $offsetConvert);
        $data['daftarCarousel'] = $this->event_model->getSemuaEvent();
        $data['daftarUlasan'] = $this->ulasan_model->getSemuaUlasan();
        $data['daftarRuangInfo'] = $this->ruanginfo_model->getSemuaRuangInfo();
        $this->load->view('home', $data);
    }

    public function destinasiDetails($id)
    {
        $data['daftarDestinasi'] = $this->destinasi_model->getDestinasiById($id);
        $data['daftarCarousel'] = $this->event_model->getSemuaEvent();
        $data['daftarUlasan'] = $this->ulasan_model->getSemuaUlasan();
        $data['daftarRuangInfo'] = $this->ruanginfo_model->getSemuaRuangInfo();
        $this->load->view('destinasiDetails', $data);
    }

    public function ruangInfoDetails($id)
    {
        $data['daftarRuangInfoDetails'] = $this->ruanginfo_model->getRuangInfoById($id);
        $data['daftarCarousel'] = $this->event_model->getSemuaEvent();
        $data['daftarUlasan'] = $this->ulasan_model->getSemuaUlasan();
        $data['daftarRuangInfo'] = $this->ruanginfo_model->getSemuaRuangInfo();
        $this->load->view('ruangInfoDetails', $data);
    }
}

?>