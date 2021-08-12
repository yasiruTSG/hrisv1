<?php

$BASIC_URL = "url";
$BASIC_AUTH_USER = "user";
$BASIC_AUTH_PASSWORD = "123";


/**
 * Test API -
 * Live API -
 */

function get($url)
{

    global $BASIC_URL;
    global $BASIC_AUTH_USER;
    global $BASIC_AUTH_PASSWORD;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $BASIC_URL . $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_USERPWD, $BASIC_AUTH_USER . ':' . $BASIC_AUTH_PASSWORD);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Accept: application/json',
            'Content-Type: application/json',
        )
    );
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;

}

function post($data, $url)
{

    global $BASIC_URL;
    global $BASIC_AUTH_USER;
    global $BASIC_AUTH_PASSWORD;


    $data_string = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $BASIC_URL . $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_USERPWD, $BASIC_AUTH_USER . ':' . $BASIC_AUTH_PASSWORD);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Accept: application/json',
            'Content-Type: application/json',
        )
    );
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;

}
