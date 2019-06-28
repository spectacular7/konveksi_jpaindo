<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_model extends CI_Model
{
	function get_limit_jenis()
	{	
		$this->db->join('pola', 'pola.KodeJenis = jenispakaian.KodeJenis');
		
		$this->db->order_by('pola.KdPola', 'ASC');
    	return $this->db->get('jenispakaian')->result_array();
	}

	function get_limit1_jenis()
	{	
		$this->db->limit(2, 0);
		$this->db->join('pola', 'pola.KodeJenis = jenispakaian.KodeJenis');
		$this->db->order_by('pola.KdPola', 'ASC');
    	return $this->db->get('jenispakaian')->result_array();
	}

	function get_limit2_jenis()
	{	
		$this->db->limit(2, 2);
		$this->db->join('pola', 'pola.KodeJenis = jenispakaian.KodeJenis');
		$this->db->order_by('pola.KdPola', 'ASC');
    	return $this->db->get('jenispakaian')->result_array();
	}
}