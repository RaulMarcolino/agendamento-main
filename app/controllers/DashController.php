<?php

namespace App\Controllers;

use Core\Controller;
use Core\Database;

class DashController extends Controller
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
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obter os dados do formulário
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            $descricao = $_POST['descricao'];

            $db = Database::connect();

            $stmt = $db->prepare("INSERT INTO agendamentos (user_id, data, hora, descricao) VALUES (:user_id, :data, :hora, :descricao)");
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':hora', $hora);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            if ($stmt->execute()) {
                echo "Agendamento realizado com sucesso!";
                // Redirecionar para a página de login
                header('Location: /dashboard');
                exit;
            } else {
                echo "Ocorreu um erro ao agendar o equipamento/ambiente.";
            }
        } else {
            // Exibir o formulário de cadastro
            $this->redirect("/dashboard");
    }
  }
  public function dash(){
    session_start();
    $db = Database::connect();
    
    try {
        // Consulta para buscar todos os agendamentos
        $stmt = $db->prepare("SELECT * FROM agendamentos ORDER BY hora");
        $stmt->execute();
    
        $_SESSION['reg'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erro ao buscar agendamentos: " . $e->getMessage());
    }
    $this->view("dash/index");
    
  }
}