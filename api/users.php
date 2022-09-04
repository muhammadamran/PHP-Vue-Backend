<?php
include "../db/db.php";
$users = $db->query("SELECT * FROM tbl_users ORDER BY id DESC", 0);
$cek = $users->num_rows;
$data = [];

while ($row = $users->fetch_assoc()) {
    $data[] = [
        'id' => $row['id'],
        'fname' => $row['fname'],
        'lname' => $row['lname'],
        'gender' => $row['gender'],
        'username' => $row['username'],
        'password' => $row['password'],
        'email' => $row['email'],
        'role' => $row['role'],
        'expired_date' => $row['expired_date'],
    ];
}
header("Access-Control-Allow-Origin: *");
header("content-type: application/json");
echo json_encode($data);
