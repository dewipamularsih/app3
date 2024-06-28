<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function index()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Account';
            $this->load->view('login', $data);
        } else {
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');
            $status     = $this->input->post('status');

            $cek = $this->model_pembayaran->cek_login($email, $password);

            if ($cek == FALSE) {
                $_SESSION["gagal"] = 'Silahkan periksa username dan password anda';
                redirect('welcome');
            } else {
                $this->session->set_userdata('level', $cek->level);
                $this->session->set_userdata('nama_user', $cek->nama_user);
                $this->session->set_userdata('id_user', $cek->id_user);
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('avatar', $cek->avatar);

                // Set session level berdasarkan status yang dipilih
                switch ($status) {
                    case 'user':
                        // Misalnya, untuk level user
                        $this->session->set_userdata('level', 2);
                        redirect('dashboard');
                        break;
                    case 'admin':
                        // Untuk level admin
                        $this->session->set_userdata('level', 1);
                        redirect('admin/dashboard');
                        break;
                    case 'superadmin':
                        // Untuk level super admin
                        $this->session->set_userdata('level', 0);
                        redirect('superadmin/dashboard');
                        break;
                    default:
                        $_SESSION["gagal"] = 'Status login tidak valid';
                        redirect('welcome');
                        break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
?>
