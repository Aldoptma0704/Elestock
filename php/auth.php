<?php

$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($userID) {
    $sql = "
        SELECT a.id, a.username, a.email , a.is_admin
        FROM users a
        WHERE a.id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_query = $result->fetch_assoc();

    $nama = isset($user_query['username']) ? $user_query['username'] : '';
    $email = isset($user_query['email']) ? $user_query['email'] : '';
    $akses = isset($user_query['akses']) ? $user_query['akses'] : '';
    $logon = 1;
    
} else {
    $user = null;
    $nama = '';
    $email = '';
    $akses = 0;
    $logon = 0;
}
?>