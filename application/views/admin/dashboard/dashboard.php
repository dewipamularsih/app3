<!-- BEGIN: Content -->
<div class="content">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Notification -->
                <div class="col-span-12 mt-6 -mb-6 intro-y">
                    <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6" role="alert">
                        <span>Hallo selamat datang, <b><?= $this->session->userdata('nama_user') ?></b> Silahkan kelola dashboard toko online Anda.</span>
                        <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                    </div>
                </div>
                <!-- END: Notification -->
                <!-- BEGIN: General Report -->

                <!-- END: Visitors -->
                <!-- BEGIN: Users By Age -->

                <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-4 mt-2 lg:mt-6 xl:mt-2">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Grafik Pesanan
                        </h2>
                        <a href="" class="ml-auto text-primary truncate"></a>
                    </div>
                    <div class="report-box-2 intro-y mt-5">
                        <div class="box p-5">
                            <ul class="nav nav-pills w-4/5 bg-slate-100 dark:bg-black/20 rounded-md mx-auto" role="tablist">
                                <li id="active-users-tab" class="nav-item flex-1" role="presentation">
                                    <button class="nav-link w-full py-1.5 px-2 active" data-tw-toggle="pill" data-tw-target="#active-users" type="button" role="tab" aria-controls="active-users" aria-selected="true"> Orders Review </button>
                                </li>
                            </ul>
                            <div class="tab-content mt-6">
                                <div class="tab-pane active" id="active-users" role="tabpanel" aria-labelledby="active-users-tab">
                                    <div class="relative">
                                        <div class="h-[208px]">
                                            <div id="chartdiv"></div>
                                        </div>

                                    </div>
                                    <div class="w-52 sm:w-auto mx-auto mt-5">
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                            <span class="truncate">PESANAN BELUM DIBAYAR</span> <span class="font-medium ml-auto"><?= $pending; ?> Orders</span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 bg-success rounded-full mr-3"></div>
                                            <span class="truncate">PESANAN SUDAH TERBAYAR</span> <span class="font-medium ml-auto"><?= $sukses; ?> Orders</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-8 mt-2 lg:mt-6 xl:mt-2">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Pesanan Masuk
                        </h2>
                        <a href="" class="ml-auto text-primary truncate"></a>
                    </div>
                    <div class="mt-5">
                        <?php foreach ($bill as $row) : ?>
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img src="<?= base_url('asset') ?>/user.png">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium"><b>#<?= $row->order_id ?></b> | <?= $row->name ?></div>
                                        <div class="text-slate-500 text-xs mt-0.5"><?= date("d F Y H:i:s", strtotime($row->transaction_time)); ?></div>
                                    </div>
                                    <div class="py-1 px-2 rounded-full text-xs bg-danger text-white cursor-pointer font-medium">Menunggu Pembayaran</div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <a href="<?= site_url('admin/invoice') ?>" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
                    </div>
                </div>
                <!-- END: Users By Age -->
            </div>

            <!-- Chat Container -->
            <div class="chat-container">
                <div class="chat-messages">
                    <!-- Example Messages -->
                    <div class="chat-message sent">
                        <div class="message-content">
                            <p></p>
                        </div>
                    </div>
                    <div class="chat-message received">
                        <div class="message-content">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="chat-input">
                    <form action="<?= site_url('chat/send'); ?>" method="post">
                        <textarea name="message" placeholder="Type your message here..."></textarea>
                        <button type="submit">Send</button>
                    </form>
                </div>
            </div>
            <!-- End Chat Container -->

        </div>
    </div>
</div>
<!-- END: Content -->
    <style>
        /* Updated CSS for Chat Container */
        .chat-container {
            width: 300px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Ensure it's above other content */
        }

        .chat-messages {
            max-height: 300px;
            overflow-y: auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-bottom: 1px solid #ccc;
        }

        .chat-input {
            display: flex;
            padding: 10px;
            background-color: #fff;
            border-top: 1px solid #ccc;
        }

        .chat-input textarea {
            flex: 1;
            padding: 10px;
            border-radius: 20px;
            border: 1px solid #ccc;
            resize: none;
        }

        .chat-input button {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
        }

        .chat-input button:hover {
            background-color: #0056b3;
        }

        /* Added CSS for chat messages */
        .chat-message {
            margin-bottom: 10px;
            clear: both;
            overflow: hidden;
        }

        .chat-message.sent .message-content {
            background-color: #007bff;
            color: white;
            float: right;
        }

        .chat-message.received .message-content {
            background-color: #f0f0f0;
            color: #333;
            float: left;
        }

        .message-content {
            padding: 10px 15px;
            border-radius: 15px;
            max-width: 70%;
            word-wrap: break-word;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-messages">
            <!-- Chat messages will be appended here -->
        </div>
        <div class="chat-input">
            <form id="message-form">
                <textarea id="message-input" placeholder="Type your message..." rows="1"></textarea>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('message-form');
            const textarea = document.getElementById('message-input');
            const chatMessages = document.querySelector('.chat-messages');

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const messageText = textarea.value.trim();
                if (messageText !== '') {
                    const message = createMessageElement(messageText, 'sent');
                    chatMessages.appendChild(message);
                    textarea.value = '';
                    chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll to bottom

                    // Simulate a received message after a delay (for demonstration)
                    setTimeout(function() {
                        const replyMessage = createMessageElement('', '');
                        chatMessages.appendChild(replyMessage);
                        chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll to bottom
                    }, 500);
                }
            });

            function createMessageElement(text, type) {
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('chat-message', type);

                const messageContent = document.createElement('div');
                messageContent.classList.add('message-content');
                messageContent.textContent = text;

                messageDiv.appendChild(messageContent);
                return messageDiv;
            }
        });
    </script>
<!-- admin_chat.php -->

