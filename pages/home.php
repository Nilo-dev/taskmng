<?php
$totalAtrasadas = 0;
$totalFinalizadas = 0;
$query = sprintf("SELECT * FROM tbl_projetos"); //Armazena a query
$dados = mysqli_query($conexao, $query) or die(mysql_error()); //Faz a seleção dos dados no banco de dados
$linha = mysqli_fetch_assoc($dados); //Armazena os dados em uma array associativa
$total = mysqli_num_rows($dados); //Armazena o número total de linhas encontradas
if ($total > 0) { //Verifica se houve retorno de linhas na base de dados
  do { //Mostra na tela os dados encontrados, enquanto houver dados a serem mostrados
        $idProjeto = $linha['id'];
        $queryAtiv = sprintf("SELECT * FROM tbl_atividades WHERE tbl_projetos_id = '$idProjeto'"); //Armazena a query
        $dadosAtiv = mysqli_query($conexao, $queryAtiv) or die(mysql_error()); //Faz a seleção dos dados no banco de dados
        $linhaAtiv = mysqli_fetch_assoc($dadosAtiv); //Armazena os dados em uma array associativa
        $totalAtiv = mysqli_num_rows($dadosAtiv); //Armazena o número total de linhas encontradas
        if ($totalAtiv > 0) { //Verifica se houve retorno de linhas na base de dados
          $maiorData = 0;
          $totalAtividades = 0;
          $totalAtivFinalizadas = 0;
          do { //Mostra na tela os dados encontrados, enquanto houver dados a serem mostrados

            // Define a data final para formato UNIX
            $data_fim_unix = strtotime($linhaAtiv['data_fim']);

            if ($data_fim_unix > $maiorData) {
              $maiorData = $data_fim_unix;
            }

            //Soma o total de atividades finalizadas
            if ($linhaAtiv['finalizada']) {
              $totalAtivFinalizadas++;
            }

            $totalAtividades++;
          } while ($linhaAtiv = mysqli_fetch_assoc($dadosAtiv));
        } else { //Caso nenhum dado seja encontrado na base de dados
          //Nenhuma atividade cadastrada
        }
        $data_fim_proj_unix = strtotime($linha['data_fim']);
        if ($maiorData > $data_fim_proj_unix) {
          //Atrasado
          $totalAtrasadas++;
          if ($totalAtivFinalizadas == $totalAtividades) {
            //Finalizada
            $totalFinalizadas++;
          } else {
            //Em andamento
          }
        } else {
          //Não atrasado
          if ($totalAtivFinalizadas == $totalAtividades) {
            //Finalizada
            $totalFinalizadas++;
          } else {
            //Em andamento
          }
        }
        mysqli_free_result($dadosAtiv); //Limpa os dados armazenados na variável
  } while ($linha = mysqli_fetch_assoc($dados));
} else { //Caso nenhum dado seja encontrado na base de dados

}
mysqli_free_result($dados); //Limpa os dados armazenados na variável
?>

<div class="andamento-projetos">
  <div class="projetos atrasados"><span><?php echo number_format((($totalAtrasadas * 100)/$total), 2); ?>%<br>Atrasados</span></div>
  <div class="projetos finalizados"><span><?php echo number_format((($totalFinalizadas * 100)/$total), 2); ?>%<br>Finalizados</span></div>
</div>
