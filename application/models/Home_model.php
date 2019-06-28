<?php


class Home_model{

    private $table='jenispakaian';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}
    
    public function getAllJenisPakaian()
	{
		$this->db->query('select * from '.$this->table);
		return $this->db->resultSet();
	}
}