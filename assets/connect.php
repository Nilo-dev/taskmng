<?php
  $conexao = mysqli_connect("localhost", "root", "", "taskmng");

  if (mysqli_connect_errno($conexao)) {
    echo "<script>alert('Erro ao conectar com a base de dados: " . mysqli_connect_error() . "');";
  }
