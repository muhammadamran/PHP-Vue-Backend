<?php
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
  
  $user = $db->query("SELECT id, password, nama, email, role, is_login, expired_date FROM user WHERE username='".$username_."' AND password='".md5($password_)."'", 0);
  $cek = $user->num_rows;
  if ($cek > 0) {
    $result = $user->fetch_assoc();
    $id = $result['id'];
    $password = $result['password'];
    $nama = $result['nama'];
    $email = $result['email'];
    $role = $result['role'];
    $is_login = $result['is_login'];
    $expired = $result['expired_date'];

    if ($is_login == 1) {
      echo json_encode([
          'status' => 409,
          'result' => [
              'message' => 'Anda sedang login diperangkat lain!'
          ]
      ]);
    } else {
      if (!empty($expired) && $expired > date('Y-m-d')) {
        echo json_encode([
            'status' => 409,
            'result' => [
                'message' => 'Akun anda telah kadaluarsa!'
            ]
        ]);
      } else {
        $data = [
            'id_user' => $id,
            'fullname' => $nama,
            'email' => $email,
            'role' => $role,
        ];

        $login = $db->query('UPDATE user SET is_login=1 WHERE id="'.$id.'"'); 
        echo json_encode([
            'status' => 200,
            'result' => $data
        ]);
      }    }
  } else {
    echo json_encode([
        'status' => 404,
        'result' => [
            'message' => 'Login gagal'
        ]
    ]);
  }
    
?>