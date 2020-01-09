<?php
    include_once '../conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>AutoFood</title>
    <meta name="description" content="curso de bootstrap 3">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
</head>
<body>
<br><br>

<div class="container">
<div class="row col-md-3"></div>
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
    <?php
        $consulta = $PDO->query("SELECT * FROM questao");
        $count = $consulta->rowCount();
        if($count<32){
    ?>
    <a href="cadastroHorario.html" class="btn btn-primary btn-xs pull-right"><b>+</b> Adicionar novo Horario</a>
    <?php
    }else{
    ?>
    <a href="cadastroHorario.html" class="btn disabled btn-primary btn-xs pull-right"><b>+</b> Adicionar novo Horario</a>
    <?php
    }
    ?>   
    <tr>
            <th>Id de Usuario</th>
            <th>Tipo de Questão</th>
            <th class="text-center">Opções</th>
        </tr>
    </thead>
            <?php
          $consulta = $PDO->query("SELECT * FROM questao order by que_id asc;");
       
          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
            <td>1</td>
            <td>".$linha['que_tipoDequestao']."</td>
            <td class=\"text-center\">
            <a href=\"excluirHorario.php?id=".$linha['que_id']."\" class=\"btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-remove\"></span> Excluir</a></td>
            </tr>";
          }
           ?>
    </table>
    </div>
    <div class="row col-md-3"></div>
</div>
</body>
</html>