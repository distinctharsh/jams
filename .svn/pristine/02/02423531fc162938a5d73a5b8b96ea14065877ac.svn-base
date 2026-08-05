<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        try {

            $db = \Config\Database::connect();
            $db->initialize();

            echo "Database Connected Successfully";

        } catch (\Throwable $e) {

            echo "<pre>";
            echo "Error: " . $e->getMessage() . "<br><br>";
            echo "File : " . $e->getFile() . "<br>";
            echo "Line : " . $e->getLine() . "<br>";
            echo "</pre>";
        }
    }
}