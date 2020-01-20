<?php
    include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Gerenciamento de Questões</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<br><br>

<div class="container">
<div class="row col-md-3"></div>
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table id="tabela" class="table table-striped custab">
    <thead>
    <?php
        $consulta = $PDO->query("SELECT * FROM questao");
        $count = $consulta->rowCount();
        if($count<32){
    ?>
    <a href="cadastrarQuestao.php" class="btn btn-primary btn-xs pull-right"><b>+</b> Adicionar nova Questão</a>
    <?php
    }else{
    ?>
    <a href="cadastrarQuestao.php" class="btn disabled btn-primary btn-xs pull-right"><b>+</b> Adicionar nova Questão</a>
    <?php
    }
    ?>   
    <tr>
            <th>Tipo de Questão</th>
            <th>Texto</th>
            <th class="text-center">Opções</th>
        </tr>
    </thead>
            <?php
          //$consulta = $PDO->query("SELECT horario,id FROM horarios order by segundos as;");
       
          $cont=0;
          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $cont++;
            echo "<tr>
            <td>".$linha['que_tipoDequestao']."</td>
            <td>".$linha['que_texto']."</td>
            <td class=\"text-center\">
            <button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"abrirModalConfirmacao(".$linha['que_id'].",".$cont.")\">Excluir</button>
           </td>
            </tr>";

          }
           ?>
    </table>
    </div>
    <div class="row col-md-3"></div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Tem certeza que deseja excluir?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="excluirQuestao()">Excluir</button>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
var id;
var linha;

function abrirModalConfirmacao(id,linha){
this.id=id;
this.linha=linha;
$('#myModal').modal('show');
}

function excluirQuestao(){
send(id,'../Controllers/excluirQuestao.php');
document.getElementById("tabela").deleteRow(linha);
$('#myModal').modal('hide');
}
  function send(id,urlClass) {
    $.post(urlClass,
  {
    metodo:1,
    idQ: id
  },
  function(data, status){
    console.log("Data: " + data + "\nStatus: " + status);
  });
}
</script>
</body>
</html>