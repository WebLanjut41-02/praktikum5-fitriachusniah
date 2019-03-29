<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {
	public function __construct()
	  {
	    parent::__construct();
	    $this->load->model('Model_Mahasiswa');
	    $this->load->helper(array('form', 'url'));
	  }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

    $this->load->database();
		$jumlah_data = $this->Model_Mahasiswa->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'mahasiswa/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Previous';
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

    $data['mahasiswa'] = $this->Model_Mahasiswa->data($config['per_page'],$from);

    $this->load->view('mahasiswa/list_mahasiswa',$data);

	}

	public function listPencarian()
	{
		$keyword = $this->input->post('keyword');
		$this->load->database();
		$query = $this->db->like('nim',$keyword)->or_like('nama',$keyword)->or_like('kelas',$keyword)->get('mahasiswa')->result();
		$jumlah_data = count($query);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'mahasiswa/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Previous';
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);


		$data['mahasiswa'] = $this->Model_Mahasiswa->data2($config['per_page'],$from,$keyword);

    $this->load->view('mahasiswa/list_mahasiswa',$data);
	}

	public function inputmahasiswa()
	{
		$this->load->view('mahasiswa/inputmahasiswa');
	}

	public function prosesinputmahasiswa(){
		    $nim 			 = $this->input->post('nim');
        $nama 		 = $this->input->post('nama');
       	$tgl_lahir = $this->input->post('tgl_lahir');
        $ipk       = $this->input->post('ipk');
        $kelas     = $this->input->post('kelas');

			$this->Model_Mahasiswa->inputmahasiswa($nim,$nama,$tgl_lahir,$ipk,$kelas);

       $message = "Data Berhasil Ditambahkan";
				   	echo "<script type='text/javascript'>
				   			alert('$message');
				   			window.location.href = '" . base_url() . "mahasiswa';
				   		  </script>";

	}

	public function editmahasiswa()
	{
		$query['data'] = $this->Model_Mahasiswa->getMahasiswa($_GET['nim']);
		$this->load->view('mahasiswa/editmahasiswa',$query);
	}


  public function deletemahasiswa()
	{
	  $this->Model_Mahasiswa->deletemahasiswa($_GET['nim']);
    $message = "Data Berhasil Dihapus";
         echo "<script type='text/javascript'>
             alert('$message');
             window.location.href = '" . base_url() . "mahasiswa';
             </script>";
	}



	public function proseseditmahasiswa(){

		$nim 			 = $this->input->post('nim');
		$nama 		 = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$ipk       = $this->input->post('ipk');
		$kelas     = $this->input->post('kelas');

		$this->Model_Mahasiswa->editmahasiswa($nim,$nama,$tgl_lahir,$ipk,$kelas);

            $message = "Data Berhasil Diubah";
				   	echo "<script type='text/javascript'>
				   			alert('$message');
				   			window.location.href = '" . base_url() . "mahasiswa';
				   		  </script>";

	}


}
