<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller {
    public function login() {
        $this->load->library('session');
        // Misal, logika autentikasi pengguna berhasil
        $id_user = 1; // Ambil ID pengguna dari database setelah autentikasi berhasil
        $this->session->set_userdata('id_user', $id_user);
        redirect('dashboard');
    }

    public function logout() {
        $this->load->library('session');
        $this->session->unset_userdata('id_user');
        redirect('login');
    }
}
