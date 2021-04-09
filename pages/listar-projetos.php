<?php
include 'assets/connect.php'; //Inclui a conexão com a base de dados
?>
<script>
  $(document).ready( function () { //Faz a formatação da tabela com o plugin DataTables
    $('#list').DataTable();
  } );
</script>
<div class="container">
  <table id="list" class="table">
    <thead>
      <tr>
        <th class="table-cell table-cell-odd">#</th>
        <th class="table-cell">Nome</th>
        <th class="table-cell table-cell-odd">Data de Início</th>
        <th class="table-cell">Data de Término</th>
        <th class="table-cell table-cell-odd">Atividades do Projeto</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = sprintf("SELECT * FROM tbl_projetos"); //Armazena a query
      $dados = mysqli_query($conexao, $query) or die(mysql_error()); //Faz a seleção dos dados no banco de dados
      $linha = mysqli_fetch_assoc($dados); //Armazena os dados em uma array associativa
      $total = mysqli_num_rows($dados); //Armazena o número total de linhas encontradas
      if ($total > 0) { //Verifica se houve retorno de linhas na base de dados
        do { //Mostra na tela os dados encontrados, enquanto houver dados a serem mostrados
          ?>
          <tr class="table-row">
            <td scope="col" class="table-cell table-cell-odd"><?php echo ($linha['id']);?></td>
            <td scope="col" class="table-cell"><?php echo ($linha['nome']);?></td>
            <td scope="col" class="table-cell table-cell-odd"><?php echo (date_format(date_create($linha['data_inicio']), "d/m/Y"));?></td>
            <td scope="col" class="table-cell"><?php echo (date_format(date_create($linha['data_fim']), "d/m/Y"));?></td>
            <td scope="col" class="table-cell">
              <!-- Gatilho do Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?php echo ($linha['id']); ?>">
                Ver atividades
              </button>
              <!-- Modal -->
              <div class="modal fade" id="modal<?php echo ($linha['id']); ?>" tabindex="-1" aria-labelledby="modal<?php echo ($linha['id']); ?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal<?php echo ($linha['id']); ?>Label">Atividades de: <?php echo ($linha['nome']); ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <table>
                        <thead>
                          <tr>
                            <th class="table-cell table-cell-odd">#</th>
                            <th class="table-cell">Nome</th>
                            <th class="table-cell table-cell-odd">Data de Início</th>
                            <th class="table-cell">Data de Término</th>
                            <th class="table-cell table-cell-odd">Finalizada?</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $projetoId = $linha['id'];
                        $queryAtividades = sprintf("SELECT * FROM tbl_atividades WHERE tbl_projetos_id = '$projetoId'"); //Armazena a query
                        $dadosAtividades = mysqli_query($conexao, $queryAtividades) or die(mysql_error()); //Faz a seleção dos dados no banco de dados
                        $linhaAtividades = mysqli_fetch_assoc($dadosAtividades); //Armazena os dados em uma array associativa
                        $totalAtividades = mysqli_num_rows($dadosAtividades); //Armazena o número total de linhas encontradas
                        if ($totalAtividades > 0) { //Verifica se houve retorno de linhas na base de dados
                          $totalAtiv = 0;
                          $totalAtivFinalizadas = 0;
                          do { //Mostra na tela os dados encontrados, enquanto houver dados a serem mostrados
                            ?>
                            <tr class="table-row">
                              <td scope="col" class="table-cell table-cell-odd"><?php echo ($linhaAtividades['id']);?></td>
                              <td scope="col" class="table-cell"><?php echo ($linhaAtividades['nome']);?></td>
                              <td scope="col" class="table-cell table-cell-odd"><?php echo (date_format(date_create($linhaAtividades['data_inicio']), "d/m/Y"));?></td>
                              <td scope="col" class="table-cell"><?php echo (date_format(date_create($linhaAtividades['data_fim']), "d/m/Y"));?></td>
                              <td scope="col" class="table-cell table-cell-odd"><?php
                                $finalizada = $linhaAtividades['finalizada'];
                                if ($finalizada) {
                                  echo ('Sim');
                                  $totalAtivFinalizadas++;
                                } else {
                                  echo ('Não');
                                }
                              ?></td>

                            </tr>
                            <?php
                            $totalAtiv++;
                          } while ($linhaAtividades = mysqli_fetch_assoc($dadosAtividades));
                          ?>
                          <tr class="table-row">
                            <td scope="col" colspan="4" class="table-cell"><strong>Porcentagem de conclusão do projeto</strong></td>
                            <td scope="col" class="table-cell"><?php echo number_format((($totalAtivFinalizadas * 100)/$totalAtiv), 2); ?>%</td>
                          <?php
                        } else { //Caso nenhum dado seja encontrado na base de dados
                          ?>
                          <tr>
                            <td scope="col" colspan="6" class="">Nenhuma atividade cadastrada.</td>
                            <td scope="col" style="display: none;" class="table-cell"></td>
                            <td scope="col" style="display: none;" class="table-cell"></td>
                            <td scope="col" style="display: none;" class="table-cell"></td>
                            <td scope="col" style="display: none;" class="table-cell"></td>
                            <td scope="col" style="display: none;" class="table-cell"></td>
                          </tr>
                          <?php
                        }
                        mysqli_free_result($dadosAtividades); //Limpa os dados armazenados na variável
                        ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer">
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <?php
        } while ($linha = mysqli_fetch_assoc($dados));
      } else { //Caso nenhum dado seja encontrado na base de dados
        ?>
        <tr>
          <td scope="col" colspan="5" class="">Nenhum projeto cadastrado.</td>
          <td scope="col" style="display: none;" class="table-cell"></td>
          <td scope="col" style="display: none;" class="table-cell"></td>
          <td scope="col" style="display: none;" class="table-cell"></td>
          <td scope="col" style="display: none;" class="table-cell"></td>
        </tr>
        <?php
      }
      mysqli_free_result($dados); //Limpa os dados armazenados na variável
      ?>
    </tbody>
  </table>
</div>
