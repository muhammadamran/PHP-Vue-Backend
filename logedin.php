<?php
session_start();
include 'db/db.php';

function login($data)
{
  if ($data['password_hash'] == $data['password']) {
    $_SESSION['id'] = $data['id'];
    $_SESSION['fname'] = $data['fname'];
    $_SESSION['lname'] = $data['lname'];
    $_SESSION['gender'] = $data['gender'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['role'] = $data['role'];
    return 2;
  } else return 1;
}

if (isset($_POST["username"])) {
  $username_ = $db->real_escape_string($_POST["username"]);
} else {
  $username_ = "";
}
if (isset($_POST["password"])) {
  $password_ = $db->real_escape_string($_POST["password"]);
} else {
  $password_ = "";
}

$user = $db->query("SELECT id, password, fname, lname, gender, email, role FROM tbl_users WHERE username='" . $username_ . "' AND password='" . md5($password_) . "'", 0);
$result = $user->fetch_assoc();
$id = $result['id'];
$password = $result['password'];
$fname = $result['fname'];
$lname = $result['lname'];
$gender = $result['gender'];
$email = $result['email'];
$role = $result['role'];

if ($role == 'admin') {
  $data = [
    'id' => $id,
    'password' => $password,
    'password_hash' => md5($password_),
    'fname' => $fname,
    'lname' => $lname,
    'gender' => $gender,
    'email' => $email,
    'role' => $role,
  ];

  $loginArea = login($data);

  if ($loginArea == 2) {
    echo '<script>alert("Hai, ' . $fname . '. you have successfully logged in!");location.href = "index.php"</script>';
  } else if ($loginArea == 1) {
    echo '<script>alert("Failed Login!");window.history.go(-1);</script>';
  }
} else {
  echo '<script>alert("Failed Login, You dont have access!");window.history.go(-1);</script>';
}
