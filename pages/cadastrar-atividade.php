<form class="" action="assets/cadastro-atividade.php" method="post">
  <?php
  if (isset($_SESSION['sucesso'])) { //Verifica se há uma mensagem de sucesso a ser mostrada
    $sucesso = $_SESSION['sucesso'];
    switch ($sucesso) {
      case 1:
      $mensagem = 'Cadastro de atividade realizado com sucesso!';
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
      $mensagem = 'Ocorreu um erro ao tentar realizar o cadastro de atividade.';
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
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label for="nome" class="form-label">Projeto</label>
        <select class="form-select" aria-label="Seletor de projetos" name="projeto">
          <option selected>Selecione o projeto</option>
          <?php
          $query = sprintf("SELECT * FROM tbl_projetos ORDER BY id ASC"); //Armazena a query
          $dados = mysqli_query($conexao, $query) or die(mysql_error()); //Faz a seleção dos dados no banco de dados
          $linha = mysqli_fetch_assoc($dados); //Armazena os dados em uma array associativa
          $total = mysqli_num_rows($dados); //Armazena o número total de linhas encontradas
          if ($total > 0) { //Verifica se houve retorno de linhas na base de dados
            do { //Mostra na tela os dados encontrados, enquanto houver dados a serem mostrados
              ?>
              <option value="<?php echo ($linha['id']);?>"><?php echo ($linha['nome']);?></option>
              <?php
            } while ($linha = mysqli_fetch_assoc($dados));
          } else { //Caso nenhum dado seja encontrado na base de dados
            ?>
              <option>Nenhum projeto cadastrado.</option>
            <?php
          }
          mysqli_free_result($dados); //Limpa os dados armazenados na variável
          ?>
        </select>
      </div>
    </div>
    <div class="col">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome da Atividade</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Entre aqui com o nome da atividade">
      </div>
    </div>
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
    <div class="col mb-3">
      <label for="data-fim" class="form-label">Finalizada?</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="finalizada" id="finalizadaSim" value="1">
        <label class="form-check-label" for="finalizadaSim">
          Sim
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="finalizada" id="finalizadaNao" checked value="0">
        <label class="form-check-label" for="finalizadaNao">
          Não
        </label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <input type="submit" value="Cadastrar" class="btn btn-primary">
    </div>
  </div>
</form>
