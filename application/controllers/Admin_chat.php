<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_chat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_messages');
    }

    public function index() {
        // Contoh halaman index untuk admin
        // Menampilkan daftar pesan dari semua pengguna
        $data['messages'] = $this->Model_messages->get_all_messages();
        $this->load->view('admin_chat', $data);
    }

    public function view($id_user) {
        // Halaman untuk melihat percakapan dengan pengguna tertentu
        $id_admin = 1; // Ganti dengan ID admin yang sesuai
        $data['messages'] = $this->Model_messages->get_messages($id_user, $id_admin);
        $this->Model_messages->mark_message_as_read($id_user); // tandai pesan sebagai sudah dibaca
        $this->load->view('admin_chat', $data);
    }

    public function send_message_to_user() {
        // Mengirim pesan balasan dari admin ke pengguna
        $message_data = array(
            'sender_id' => 1, // ID admin
            'receiver_id' => $this->input->post('receiver_id'), // ID pengguna
            'message' => $this->input->post('message'),
            'timestamp' => date('Y-m-d H:i:s'),
            'read_status' => 0 // Pesan belum dibaca oleh pengguna
        );

        $this->Model_messages->send_message($message_data);

        // Redirect atau response JSON sebagai balasan
        redirect('admin_chat/view/' . $this->input->post('receiver_id'));
    }

    public function count_unread_messages() {
        // Menghitung jumlah pesan yang belum dibaca oleh admin
        $id_admin = 1; // Ganti dengan ID admin yang sesuai
        $unread_count = $this->Model_messages->count_unread_messages($id_admin);
        echo "Jumlah pesan yang belum dibaca: " . $unread_count;
}

}
?>
