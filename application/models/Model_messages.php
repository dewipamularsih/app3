<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_messages extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_messages($id_user, $id_admin) {
        $this->db->where('(sender_id = ' . $id_user . ' AND receiver_id = ' . $id_admin . ') OR (sender_id = ' . $id_admin . ' AND receiver_id = ' . $id_user . ')');
        $this->db->order_by('timestamp', 'ASC');
        $query = $this->db->get('messages');
        return $query->result();
    }

    public function send_message($data) {
        $this->db->insert('messages', $data);
    }
    public function get_users_with_last_message() {
        // Mengambil daftar pengguna dengan pesan terakhir dari masing-masing pengguna
        $this->db->select('users.id, users.username, messages.message_content, messages.timestamp');
        $this->db->from('users');
        $this->db->join('(SELECT MAX(id) AS id, sender_id, message_content, timestamp FROM messages GROUP BY sender_id) AS messages', 'users.id = messages.sender_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_message_by_id($message_id) {
        $query = $this->db->get_where('messages', array('message_id' => $message_id));
        return $query->row();
    }

    // Tambahan method untuk notifikasi jika diperlukan
    public function count_unread_messages($id_admin) {
        $this->db->where('receiver_id', $id_admin);
        $this->db->where('read_status', 0); // Menandakan pesan belum dibaca
        return $this->db->count_all_results('messages');
    }

    // Method untuk menandai pesan sebagai sudah dibaca
    public function mark_message_as_read($message_id) {
        $this->db->where('message_id', $message_id);
        $this->db->update('messages', array('read_status' => 1));
    }

    // Method untuk mendapatkan pesan yang belum dibaca
    public function get_unread_messages() {
        $this->db->where('read_status', 0);
        $query = $this->db->get('messages');
        return $query->result();
    }

    // Method untuk mendapatkan semua pesan (tanpa filter user)
    public function get_all_messages() {
        $this->db->order_by('timestamp', 'ASC');
        $query = $this->db->get('messages');
        return $query->result();
    }
}
?>
