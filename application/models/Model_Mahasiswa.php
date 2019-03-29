<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Mahasiswa extends CI_Model {


	public function getAllMahasiswa(){

	    $this->db->from('mahasiswa');
	    $query = $this->db->get();
	    return $query->result();
	}

	function data($number,$offset){
	return $query = $this->db->get('mahasiswa',$number,$offset)->result();
}

function jumlah_data(){
	return $this->db->get('mahasiswa')->num_rows();
}

	public function getMahasiswa($id){
		$this->db->from('mahasiswa');
		$this->db->where('nim',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function inputmahasiswa($nim,$nama,$tgl_lahir,$ipk,$kelas){

 	$data = array(
        'nim' =>  $nim,
        'nama' => $nama,
        'tgl_lahir'=>  $tgl_lahir,
        'ipk' => $ipk,
        'kelas' => $kelas
	);

		$this->db->insert('mahasiswa', $data);

	}

	public function editmahasiswa($nim,$nama,$tgl_lahir,$ipk,$kelas)
    {


			$data = array(
	         'nama' => $nama,
	         'tgl_lahir'=>  $tgl_lahir,
	         'ipk' => $ipk,
	         'kelas' => $kelas
	 	);

	$this->db->where('nim', $nim);
	$this->db->update('mahasiswa', $data);

}



				public function deletemahasiswa($id)
		         {

		             $query = $this->db->query("DELETE FROM mahasiswa WHERE nim = '$id'");
		             return $query;
		         }



						function data2($number,$offset,$cari){
							return $query = $this->db->like('nim',$cari)->or_like('nama',$cari)->or_like('kelas',$cari)->get('mahasiswa',$number,$offset)->result();


						}


}
	?>
