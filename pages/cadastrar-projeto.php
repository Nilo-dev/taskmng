<form class="" action="assets/cadastro-projeto.php" method="post">
  <?php
  if (isset($_SESSION['sucesso'])) { //Verifica se há uma mensagem de sucesso a ser mostrada
    $sucesso = $_SESSION['sucesso'];
    switch ($sucesso) {
      case 1:
      $mensagem = 'Cadastro de projeto realizado com sucesso!';
      break;
    }
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <?php echo ($mensagem); ?>
    </div>
    <?php
    unset($_SESSION['sucesso']);
  }
  if (isset($_SESSION['erro'])) { //Verifica se há uma mensagem de erro a ser mostrada
    $erro = $_SESSION['erro'];
    switch ($erro) {
      case 1:
      $mensagem = 'Ocorreu um erro ao tentar realizar o cadastro de projeto.';
      break;
    }
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <?php echo ($mensagem); ?>
    </div>
    <?php
    unset($_SESSION['erro']);
  }
  ?>
  <div class="mb-3">
    <label for="nome" class="form-label">Nome do Projeto</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Entre aqui com o nome do projeto">
  </div>
  <div class="row">
    <div class="col mb-3">
      <label for="data-inicio" class="form-label">Data do Início</label>
      <input type="date" class="form-control" id="data-inicio" name="data-inicio">
    </div>
    <div class="col mb-3">
      <label for="data-fim" class="form-label">Data do Término</label>
      <input type="date" class="form-control" id="data-fim" name="data-fim">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <input type="submit" value="Cadastrar" class="btn btn-primary">
    </div>
  </div>
</form>
