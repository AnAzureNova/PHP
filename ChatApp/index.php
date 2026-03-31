<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CHATROOM</h1>
    <input name="chatroom" id="chatroom" placeholder="Chatroom" value="Default">
    <?php
        $chatroom = $_POST["chatroom"];
        $log = 'CACHE/'.$chatroom.'.txt';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $msg = trim($_POST['message'] ?? '');
            if ($msg !== '') {
                file_put_contents($log, json_encode(['ts' => time(), 'name' => 'Anon', 'text' => htmlspecialchars($msg)])."\n", FILE_APPEND | LOCK_EX);
            }
            exit;
        }
    ?>
    <section class="chatsplit_display" id="chat">
    </section>
    <section class="chatsplit_send">
        <textarea id="messageInput" name="message" placeholder="Message..." required></textarea>
        <button id="sendBtn" type="button">SEND</button>
    </section>

<script src="SCRIPT/chat.js"></script>
</body>
</html>