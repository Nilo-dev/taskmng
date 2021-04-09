<?php
include 'connect.php';
session_start();

if (isset($_POST['projeto']) && isset($_POST['nome']) && isset($_POST['data-inicio']) && isset($_POST['data-fim']) && isset($_POST['finalizada'])) {

  $projeto = $_POST['projeto'];
  $nome = $_POST['nome'];
  $data_inicio = $_POST['data-inicio'];
  $data_fim = $_POST['data-fim'];
  $finalizada = $_POST['finalizada'];

  $query = mysqli_query($conexao, "INSERT INTO tbl_atividades VALUES(DEFAULT,'$nome','$data_inicio','$data_fim', '$finalizada', '$projeto')") or die(mysqli_error($conexao));

  $_SESSION['sucesso'] = 1;
  header('Location: ../index.php?page=cadastrarAtividade');

} else {

  $_SESSION['erro'] = 1;
  header('Location: ../index.php?page=cadastrarAtividade');

}
