<?php
  if (!empty($_POST["id_user"])) {
      $limit = "";
  } else {
      $limit = "LIMIT 5";
  }
  $galeri = $db->query("SELECT id, title, gambar FROM galeri ORDER BY id DESC ".$limit."", 0);
  $cek = $galeri->num_rows;
  if ($cek > 0) {
    $data = [];

    while ($result = $galeri->fetch_assoc()) {
        $data[] = [
            'id_galeri' => $result['id'],
            'title' => $result['title'],
            'gambar' => $result['gambar']
        ];
    }

    echo json_encode([
        'status' => 200,
        'result' => $data
    ]);
  } else {
    echo json_encode([
        'status' => 404,
        'result' => 'Data not found'
    ]);
  }
    
?>