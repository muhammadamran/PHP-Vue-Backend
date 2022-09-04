<?php
  include "db.php";

  if (!empty($_GET['id'])) {
    $news_artikel = $db->query("SELECT id, title, sinopsis, content, created_date, image FROM blog WHERE tipe='news-artikel' AND id='".$_GET['id']."' ORDER BY id DESC", 0);
    $cek = $news_artikel->num_rows;
    if ($cek > 0) {
        $result = $news_artikel->fetch_assoc();
        
        $data = [
            'id_news_artikel' => $result['id'],
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
    $news_artikel = $db->query("SELECT id, title, sinopsis, content, created_date, image FROM blog WHERE tipe='news-artikel' ORDER BY id DESC", 0);
    $cek = $news_artikel->num_rows;
    if ($cek > 0) {
        $data = [];

        while ($result = $news_artikel->fetch_assoc()) {
            $data[] = [
                'id_news_artikel' => $result['id'],
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