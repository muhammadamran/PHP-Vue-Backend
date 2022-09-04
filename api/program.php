<?php
  if (!empty($_GET['id'])) {
    $rogram = $db->query("SELECT id, title, sinopsis, content, created_date, image FROM blog WHERE tipe='program' AND id='".$_GET['id']."' ORDER BY id DESC", 0);
    $cek = $rogram->num_rows;
    if ($cek > 0) {
        $result = $rogram->fetch_assoc();
        
        $data = [
            'id_program' => $result['id'],
            'title' => $result['title'],
            'sinopsis' => $result['sinopsis'],
            'content' => $result['content'],
            'created_date' => $helpers->dateTimeIndonesia($result['created_date']),
            'thumbnail' => $result['image']
        ];

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
  } else {
    $rogram = $db->query("SELECT id, title, sinopsis, content, created_date, image FROM blog WHERE tipe='program' ORDER BY id DESC", 0);
    $cek = $rogram->num_rows;
    if ($cek > 0) {
        $data = [];

        while ($result = $rogram->fetch_assoc()) {
            $data[] = [
                'id_program' => $result['id'],
                'title' => $result['title'],
                'sinopsis' => $result['sinopsis'],
                'content' => $result['content'],
                'created_date' => $helpers->dateTimeIndonesia($result['created_date']),
                'thumbnail' => $result['image']
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
  }
?>