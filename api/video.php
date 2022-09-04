<?php
  if (!empty($_POST["id_user"])) {
      $limit = "";
  } else {
      $limit = "LIMIT 5";
  }
  $video = $db->query("SELECT id, title, video FROM video ORDER BY id DESC ".$limit."", 0);
  $cek = $video->num_rows;
  if ($cek > 0) {
    $data = [];

    while ($result = $video->fetch_assoc()) {
        $data[] = [
            'id_video' => $result['id'],
            'title' => $result['title'],
            'video' => $result['video']
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