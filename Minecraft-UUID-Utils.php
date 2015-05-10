<?php

function getUUID($username) {
	if(strlen($username) >= 16)
		return false;
    //  Initiate curl
    $ch = curl_init();
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,' https://api.mojang.com/users/profiles/minecraft/'.$username);
    // Execute
    $json=curl_exec($ch);
    $data = json_decode($json,true);
    return formatUUID($data['id']);
}

function getUsername($uuid) {
	if(strlen($uuid) != 36 && strlen($uuid) != 32)
		return false;
    if(strlen($uuid) == 36) {
        $uuid = deformatUUID($uuid);
    }
    //  Initiate curl
    $ch = curl_init();
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,'https://api.mojang.com/user/profiles/'.$uuid.'/names');
    // Execute
    $json=curl_exec($ch);
    $data = json_decode($json,true);
	return end($data)['name'];
}

function formatUUID($uuid) {
    $uid = "";
    $uid .= substr($uuid, 0, 8)."-";
    $uid .= substr($uuid, 8, 4)."-";
    $uid .= substr($uuid, 12, 4)."-";
    $uid .= substr($uuid, 16, 4)."-";
    $uid .= substr($uuid, 20);
    return $uid;
}

function deformatUUID($uuid) {
    $uuid = str_replace("-","",$uuid);
    return $uuid;
}