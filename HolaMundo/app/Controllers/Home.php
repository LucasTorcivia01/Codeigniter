<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $data["nombre"] = "Pedro Picapiedra";
        echo view('welcome_message',$data);
    }
}
