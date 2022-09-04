<?php
    if (isset($_GET["id"])) {
        $id = $db->real_escape_string($_GET["id"]);
    } else {
        $id = 0;
    }

    $news_artikel = $db->query("SELECT id, title, sinopsis, content, created_date, image FROM blog WHERE id='".$id."' ORDER BY id DESC LIMIT 1", 0);

    $data = [];
   	$result = $news_artikel->fetch_assoc();
    $data = [
        'id_blog' => $result['id'],
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
?>