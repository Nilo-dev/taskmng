<?php
include 'connect.php';
session_start();

if (isset($_POST['nome']) && isset($_POST['data-inicio']) && isset($_POST['data-fim'])) {

  $nome = $_POST['nome'];
  $data_inicio = $_POST['data-inicio'];
  $data_fim = $_POST['data-fim'];

  $query = mysqli_query($conexao, "INSERT INTO tbl_projetos VALUES(DEFAULT,'$nome','$data_inicio','$data_fim')") or die(mysqli_error($conexao));

  $_SESSION['sucesso'] = 1;
  header('Location: ../index.php?page=cadastrarProjeto');

} else {

  $_SESSION['erro'] = 1;
  header('Location: ../index.php?page=cadastrarProjeto');

}
