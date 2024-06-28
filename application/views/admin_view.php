<!DOCTYPE html>
<html>
<head>
    <title>Admin Chat</title>
</head>
<body>
    <div id="chat-box">
        <?php foreach ($messages as $message): ?>
            <div class="<?php echo ($message->sender_id == $this->session->userdata('id_admin')) ? 'admin-message' : 'user-message'; ?>">
                <p><?php echo $message->message; ?></p>
                <span><?php echo $message->timestamp; ?></span>
            </div>
        <?php endforeach; ?>
    </div>
    <form method="post" action="<?php echo base_url('Admin_chat/send_message'); ?>">
        <input type="hidden" name="id_user" value="<?php echo $this->input->get('id_user'); ?>">
        <input type="text" name="message" required>
        <button type="submit">Send</button>
    </form>
</body>
</html>
