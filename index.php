<?php
include 'assets/connect.php'; //Inclui a abertura da conexão

$page = isset($_GET['page'])? $_GET['page']:''; //Verifica se uma página já esta setada

include 'assets/header.php'; //Inclui o cabeçalho

switch ($page) { //Seleciona o script da  página de acordo com a url
  case 'cadastrarProjeto':
    include 'pages/cadastrar-projeto.php';
    break;
  case 'cadastrarAtividade':
    include 'pages/cadastrar-atividade.php';
    break;
  case 'listarProjetos':
    include 'pages/listar-projetos.php';
    break;
  default:
    include 'pages/home.php';
}

include 'assets/footer.php'; //Inclui o rodapé
