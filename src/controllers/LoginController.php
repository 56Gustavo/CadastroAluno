<?php
require_once "../CadastroAluno/src/models/user.php";

class LoginController {
    private $users;

    public function __construct() {
        $this->users = [
            new user(3, 'jose@teste.com.br', '1234',  2),
            new user(4, 'joao@teste.com.br', '1234',  1)
        ];
    }

    public function autenticar($email, $password) {
        foreach ($this->users as $user) {
            if ($user->email === $email && $user->verificarSenha($password)) {
                $_SESSION['autenticar'] = 'SIM';
                $_SESSION['id'] = $user->id;
                $_SESSION['profile_id'] = $user->profile_id;
                header('Location: ../CadastroAluno/src/view/home.php');
                exit;
            }
        }

        $_SESSION['autenticar'] = 'NAO';
        header('Location: index.php?login=erro');
        exit;
    }
}