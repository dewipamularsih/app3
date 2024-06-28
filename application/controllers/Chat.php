<?php
defined('BASEPATH') or exit('No direct script access allowed');
// application/controllers/Chat.php
class Chat extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_messages');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));

        // Periksa apakah id_user ada di sesi
        if (!$this->session->userdata('id_user')) {
            redirect('login');
        }
    }

    public function index() {
        $id_user = $this->session->userdata('id_user');
        $data['messages'] = $this->Model_messages->get_messages($id_user, 1); // 1 adalah ID admin
        $this->load->view('chat_view', $data);
    }

    public function send() {
        $this->form_validation->set_rules('message', 'Pesan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            $data = array(
                'sender_id' => $this->session->userdata('id_user'),
                'receiver_id' => 1, // ID admin
                'message' => $this->input->post('message')
            );
            $this->Model_messages->send_message($data);
            redirect('chat');
  }
}

}
