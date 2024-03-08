<?php
// registra_chamado.php
session_start();
require_once "../../validador_acesso.php";


// array privado 

if(!isset($_SESSION["aluno"])){
	$_SESSION["aluno"] = "";
}


	//estamos trabalhando na montagem do texto
	$nome= str_replace('#', '-', $_POST['nome']);
	$matricula = str_replace('#', '-', $_POST['matricula']);
	$curso = str_replace('#', '-', $_POST['curso']);

	//implode('#', $_POST);

	$texto = $_SESSION['id'] . '#' . $nome . '#' . $matricula . '#' . $curso . PHP_EOL;


// cadastrando aluno no array

$alunos = [
	'id' =>$_SESSION['id'],
	'nome' => $nome,
	'matricula' => $matricula,
	'curso' => $curso,
];


$_SESSION['alunos'] [] = $alunos;


	
	header('Location: home.php');
?>