<?php

namespace App\Controllers;

use Core\Controller;
use Core\Database;

class AuthController extends Controller
{

  public function register(){

    if($_SERVER['REQUEST_METHOD'] === "POST"){
      $name = $_POST['name'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $db = Database::connect();

      $stm = $db->prepare("INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)");
      
      $hash_password = password_hash($password, PASSWORD_DEFAULT);

      $stm->bindParam(":name", $name);
      $stm->bindParam(":username", $username);
      $stm->bindParam(":email", $email);
      
      $stm->bindParam(":password", $hash_password);
      
        if($stm->execute()) {
          $this->redirect('/login');
        }

    }
    $this->view('/auth/register');
  }

  public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Iniciar a sessão
            session_start();

            // Verificar se os campos não estão vazios
            if (empty($username) || empty($password)) {
                $_SESSION['error_message'] = "Por favor, preencha todos os campos.";
                header('Location: /login');
                exit;
            }

            // Verificar se o usuário existe no banco de dados
            $db = Database::connect();
            $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                // Senha está correta, iniciar a sessão
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['name']; // Salvando o nome completo do usuário na sessão

                echo "Login realizado com sucesso!";
                header('Location: /dashboard');
                exit;
            } else {
                $_SESSION['error_message'] = "Usuário ou senha incorretos.";
                header('Location: /login');
                exit;
            }
        } else {
            // Exibir o formulário de login
            $this->view('auth/login');
        }
    }
    public function dash()
 {
  $sql ="SELECT * FROM equip";
  $db = Database::connect();
  $stm = $db->prepare($sql);
  $equips = $stm->execute();

  $this->view('dash/index', ['equips' => $equips]);
    }
}