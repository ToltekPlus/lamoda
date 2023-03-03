<?php
    $db = [
        ["name" => "Monika", "img" => "/services/monika.jpg"],
        ["name" => "Eva",  "img" => "/services/eva.jpg"],
        ["name" => "Amanda",  "img" => "/services/amanda.jpg"]
    ];

    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json; charset=utf-8");
    header("HTTP/1.1 200 Success");

    echo json_encode($db);