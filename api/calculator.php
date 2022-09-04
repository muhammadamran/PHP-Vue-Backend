<?php
    function getArray($arr, $filter) {
        return array_filter($arr, function ($var) use ($filter) {
            return ($var['name'] == $filter);
        });
    }

    $calculator_free = $db->query("SELECT title, slug, category FROM calculator WHERE category='free' ORDER BY id ASC", 0);
    $calculator_member = $db->query("SELECT title, slug, category FROM calculator WHERE category='member' ORDER BY id ASC", 0);

    $free = [];
    while ($result = $calculator_free->fetch_assoc()) {
        $free[] = [
            'title' => $result['title'],
            'slug' => $result['slug']
        ];
    }
    $member = [];
    while ($result = $calculator_member->fetch_assoc()) {
        $member[] = [
            'title' => $result['title'],
            'slug' => $result['slug']
        ];
    }

    $result = [
        'free' => $free,
        'member' => $member
    ];

    echo json_encode([
        'status' => 200,
        'result' => $result
    ]);
?>