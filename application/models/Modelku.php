<?php

class Modelku extends CI_Model
{
	public function jmlData($tabel)
	{
	 	$query = $this->db->query("select * from $tabel")->num_rows();
		return $query;
	}

}