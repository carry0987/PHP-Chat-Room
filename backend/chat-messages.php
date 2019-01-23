<?php
require 'connect-to-db.php';
$get_query = 'SELECT message.id,content,time,sender_id FROM message INNER JOIN user ON message.sender_id=user.id ORDER BY message.id DESC LIMIT 20';
$get_stmt = $handler->stmt_init();
if ($get_stmt->prepare($get_query)) {
    //$get_stmt->bind_param('i', $id);
    $get_stmt->execute();
    $get_stmt->bind_result($id, $time, $sender_id ,$content);
    $get_result = $get_stmt->get_result();
    if ($get_result->num_rows != 0) {
        while ($get_row = $get_result->fetch_assoc()) {
            $message_row[] = $get_row;
        }
    }
}

if (!empty($message_row)) {
    echo json_encode($message_row);
}
