<?php
	function sendMessage(){
	    $content = [
	        "en" => 'Testing Message'
	    ];

	    $fields = [
	        'app_id' => "f86f9bc3-0321-464c-abd9-9d945eaf2585",
	        'included_segments' => ['All'],
	        'data' => [
	        	"foo" => "bar"
	        ],
	        'large_icon' =>"ic_launcher_round.png",
	        'contents' => $content
	    ];

	    $fields = json_encode($fields);

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, [
	    	'Content-Type: application/json; charset=utf-8',
	        'Authorization: Basic NWY1MzgyZjMtY2M4Yy00NTg3LTkxOTYtNzhlYWFkMjFjYWE1'
	    ]);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

	    $response = curl_exec($ch);
	    curl_close($ch);

	    return $response;
	}

	$response = sendMessage();

	var_dump('<pre>', $response);

	return $response;