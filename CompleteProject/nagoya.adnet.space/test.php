<?php
/**
 * Created by PhpStorm.
 * User: QUE
 * Date: 3/13/2017
 * Time: 2:24 PM
 */
// Tạo mới một CURL
$ch = curl_init();

// Cấu hình cho CURL
curl_setopt($ch, CURLOPT_URL, "http://freetuts.net/");

// Thực thi CURL
curl_exec($ch);

// Ngắt CURL, giải phóng
curl_close($ch);