<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_model extends CI_Model
{
	function get_limit_jenis()
	{	
		$this->db->order_by('jenispakaian.KodeJenis', 'ASC');
    	return $this->db->get('jenispakaian')->result_array();
	}

	function get_barang_by_kddesain($id)
	{	
		$this->db->join('desain', 'barang.KdDesain = desain.KdDesain');
		$this->db->join('pola', 'desain.KdPola = pola.KdPola');
		$this->db->join('jenispakaian', 'pola.KodeJenis = jenispakaian.KodeJenis');
		
		$this->db->where('barang.KdDesain', $id);
		return $this->db->get('barang')->result_array();
	}

	function get_jenis_by_kddesain($id)
	{	
		$this->db->join('pola', 'pola.KodeJenis = jenispakaian.KodeJenis');
		$this->db->join('desain', 'desain.KdPola = pola.KdPola');
		$this->db->join('barang', 'barang.KdDesain = desain.KdDesain');
		
		$this->db->where('barang.KdDesain', $id);
		return $this->db->get('jenispakaian')->row();
	}

	function get_pola_by_kdjenis($id)
	{	
		$this->db->where('KodeJenis', $id);
		return $this->db->get('pola')->result_array();
	}

	function get_design($id)
	{	
		$this->db->where('KdDesain', $id);
		return $this->db->get('desain')->row();
	}

	function get_desain_by_kdpola($id)
	{	
		$this->db->where('KdPola', $id);
		return $this->db->get('desain')->result_array();
	}

	function get_limit1_jenis()
	{	
		$this->db->limit(2, 0);
		$this->db->order_by('jenispakaian.KodeJenis', 'ASC');
    	return $this->db->get('jenispakaian')->result_array();
	}

	function get_limit2_jenis()
	{	
		$this->db->limit(2, 2);
		$this->db->order_by('jenispakaian.KodeJenis', 'ASC');
    	return $this->db->get('jenispakaian')->result_array();
	}
}