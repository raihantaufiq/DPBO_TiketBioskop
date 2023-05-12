<?php
/*
Filename    : DB.class.php
Programmer  : Raihan Taufiqurrahman
Email       : raihantaufiqurrahman@upi.edu
Deskripsi   : model kelas untuk mengakses basis data
*/

class DB
{
	var $db_host = 'localhost'; // host
	var $db_user = 'root'; // user database
	var $db_password = ''; // password
	var $db_name = 'dbTiketBioskop'; // nama database
	var $db_link = ''; 
	var $result = 0;

	function DB()
	{
		// konstruktor
	}

	function open()
	{
		// membuka koneksi
		$this->db_link = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);
	}

	function execute($query = "")
	{
		// mengeksekusi query
		$this->result = mysqli_query($this->db_link, $query);

		return $this->result;
	}

	function getResult()
	{
		// mengambil ekseskusi query
		return mysqli_fetch_array($this->result);
	}

	function close()
	{
		// menutup koneksi
		mysqli_close($this->db_link);
	}
}
