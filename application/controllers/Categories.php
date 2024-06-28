<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{
	public function hewan_qurban()
	{
		$data['title'] = 'hewan qurban Categories';
		$data['hewan_qurban'] = $this->model_kategori->hewan_qurban()->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('hewan', $data);
		$this->load->view('layout/home/footer');
	}
	public function perlengkapan_qurban()
	{
		$data['title'] = 'perlengkapan qurban Categories';
		$data['perlengkapan'] = $this->model_kategori->perlengkapan_qurban()->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('perlengkapan_qurban', $data);
		$this->load->view('layout/home/footer');
	}
}
