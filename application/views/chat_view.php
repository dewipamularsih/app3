<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        /* Global CSS */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f2f2f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* CSS untuk tampilan chat */
        .chat-container {
            width: 100%;
            max-width: 600px;
            height: 90vh;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            background-color: #007AFF;
            color: white;
            text-align: center;
            padding: 20px 15px;
            font-size: 1.4em;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .chat-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            background-color: #f2f2f7;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .chat-message {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            max-width: 80%;
            margin-bottom: 10px;
        }

        .chat-message.self {
            align-self: flex-end;
            align-items: flex-end;
        }

        .chat-message .meta {
            font-size: 0.75em;
            color: #8e8e93;
            margin-bottom: 5px;
        }

        .chat-message .message {
            background-color: #e5e5ea;
            color: black;
            padding: 10px 15px;
            border-radius: 20px;
            position: relative;
            word-wrap: break-word;
        }

        .chat-message.self .message {
            background-color: #007AFF;
            color: white;
        }

        .chat-form {
            padding: 10px;
            background-color: #fff;
            display: flex;
            align-items: center;
            border-top: 1px solid #ddd;
        }

        .chat-form textarea {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            resize: none;
            font-size: 0.9em;
            margin-right: 10px;
        }

        .chat-form button {
            background-color: #007AFF;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 20px;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .chat-form button:hover {
            background-color: #005bb5;
        }

        @media (max-width: 600px) {
            .chat-container {
                width: 100%;
                height: 100vh;
                border-radius: 0;
            }

            .chat-header {
                padding: 15px;
                font-size: 1.2em;
            }

            .chat-form textarea {
                margin-right: 5px;
            }

            .chat-form button {
                padding: 10px;
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <h2 class="chat-header">Chat Interface</h2>
        
        <div class="chat-messages">
            <!-- Daftar Pesan -->
            <?php foreach ($messages as $message): ?>
                <div class="chat-message<?php if (isset($message->is_self) && $message->is_self) echo ' self'; ?>">
                    <div class="meta">
                        <?php echo date('d-M-Y H:i:s', strtotime($message->timestamp)); ?>
                    </div>
                    <div class="message">
                        <?php echo htmlspecialchars($message->message); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Formulir Kirim Pesan -->
        <form action="<?php echo site_url('chat/send'); ?>" method="post" class="chat-form">
            <textarea name="message" rows="2" placeholder="Tulis pesan..." required></textarea>
            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>
