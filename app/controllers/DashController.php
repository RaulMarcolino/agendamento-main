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
    public function save(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obter os dados do formulário
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            $descricao = $_POST['descricao'];

            $stmt = $db->prepare("INSERT INTO agendamentos (data, hora, descricao) VALUES (:data, :hora, :descricao)");
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':hora', $hora);
            $stmt->bindParam(':descricao', $descricao);
            if ($stmt->execute()) {
                echo "Agendamento realizado com sucesso!";
                // Redirecionar para a página de login
                header('Location: /dash');
                exit;
            } else {
                echo "Ocorreu um erro ao agendar o equipamento/ambiente.";
            }
        } else {
            // Exibir o formulário de cadastro
            $this->view('dash/index.php');
    }
  }
}