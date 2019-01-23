<?php
session_start();
if (!$_SESSION['username'] && !$_SESSION['id']) {
    header('Location: login.html');
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0 ,maximum-scale=1.0, initial-scale=1">
    <title>Chat-Room</title>
    <link rel="stylesheet" type="text/css" href="./static/css.php?file=style.css">
</head>
<body>
    <div class="hello">
        <p>Hello <?php echo $_SESSION['username']; ?></p>
    </div>
    <nav class="logout">
        <button type="button" onclick="window.location.href='./backend/logout.php'">Logout</button>
    </nav>
    <div id="wrapper">
        <ul id="chat-area"></ul>
        <form id="message-form">
            <input type="text" id="message" placeholder="Say hello!" autocomplete="off">
            <input type="submit" value="send" id="send-button">
        </form>
    </div>
    <script src="./static/js.php?file=jquery.min.js"></script>
    <script src="./static/js.php?file=main.js"></script>
</body>
</html>