<?php
  include "db.php";
  $banner = $db->query("SELECT id, link, image FROM banner WHERE expired_date IS NULL OR expired_date > ".date('Y-m-d')." ORDER BY id DESC", 0);
  $cek = $banner->num_rows;
    $data = [];

    while ($result = $banner->fetch_assoc()) {
        $data[] = [
            'id_banner' => $result['id'],
            'link' => $result['link'],
            'image' => $result['image']
        ];
    }

    echo json_encode([
        'status' => 200,
        'result' => $data
    ]);
    
?>