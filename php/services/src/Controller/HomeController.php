<?php

namespace App\Controller;

final class HomeController {
    public function index(): bool
    {
        $db = Array (
            Array ("name" => "apples", "value" => 5, "img" => "/content/apple.jpg"),
            Array ("name" => "oranges", "value" => 3, "img" => "/content/orange.jpg"),
            Array ("name" => "pears", "value" => 12, "img" => "/content/pear.jpg")
        );

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With");
        header("Content-type:application/json");
        header("HTTP/1.1 200 Success");

        echo json_encode($db);
        return true;
    }
}