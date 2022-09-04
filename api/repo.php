<?php
  if (!empty($_POST["id_user"])) {
      $limit = "";
  } else {
      $limit = "LIMIT 5";
  }
  $repo = $db->query("SELECT id, nama_file, file FROM repo ORDER BY id DESC ".$limit."", 0);
  $cek = $repo->num_rows;
  if ($cek > 0) {
    $data = [];

    while ($result = $repo->fetch_assoc()) {
        $data[] = [
            'id_repo' => $result['id'],
            'nama_file' => $result['nama_file'],
            'file' => $result['file']
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