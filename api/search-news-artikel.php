<?php
    if (isset($_POST["title"])) {
        $title = $db->real_escape_string($_POST["title"]);
    } else {
        $title = "";
    }

    $news_artikel = $db->query("SELECT id, title, sinopsis, content, created_date, image FROM blog WHERE tipe='news-artikel' AND title LIKE '%".$title."%' ORDER BY id DESC", 0);

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
?>