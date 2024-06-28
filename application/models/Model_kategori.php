<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori extends CI_Model
{
	public function hewan_qurban()
	{
		return $this->db->get_where('product', array('kategori' => 'Hewan'));
	}
	public function perlengkapan_qurban()
	{
		return $this->db->get_where('product', array('kategori' => 'Perlengkapan'));
	}
}
