<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $sql ="SELECT * FROM equip";
        $db = Database::connect();
        $stm = $db->prepare($sql);
        $stm->execute();

        $equips = $stm->queryAll();
        $this->view('dash/index', ['equips' => $equips]);
    }
}