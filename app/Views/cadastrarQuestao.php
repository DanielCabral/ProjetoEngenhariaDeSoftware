<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.4.1/cerulean/bootstrap.min.css" integrity="sha256-zCHsVYGTqGR4WvnguOpcJQuL1wBiEgiiACzjfh0M0Ak=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
    <style>
        body { 
            /*background: url(http://lorempixel.com/1920/1920/city/9/) no-repeat center center fixed; */
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .spacer {
            margin-top: 140px; /* define margin as you see fit */
        }
    </style>
     <!-- Custom fonts for this template -->
     <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="home/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
  <link href="home/css/resume.min.css" rel="stylesheet">
  <link href="home/css/resume.css" rel="stylesheet">
    <!-- Imports -->
    <link rel="import" href="../Views/home/menulateral.php">
</head>
<body id="page-top">
<div class="container">
    <div class="row spacer">
        <div class="span4"></div>
        <div class="span4"></div>
        <div class="span4"></div>
    </div>
    <div class="row">
    <br><br><br>
<script>
  var link = document.querySelector('link[rel="import"]');
  var content = link.import;    
  // Grab DOM from warning.html's document.
  var el = content.querySelector('.barralateral');    
  document.body.appendChild(el.cloneNode(true));
</script>
    <aside class="col-sm-2">
    </aside>
        <aside class="col-sm-8">
        <div class="card">
        <article class="card-body">
        <h4 class="card-title mb-4 mt-1">Cadastrar Nova Questão</h4>
            <form>
            <label>Tipo de questão: </label>
                <div class="radio">
                <label><input type="radio" id="tipo1" name="tipo" value="0" checked>Objetiva</label>
                </div>
                <div class="radio">
                <label><input type="radio" id="tipo2" name="tipo" value="1">Verdadeiro/Falso</label>
                </div>
                <div class="form-group">
                    <label>Texto</label>
                    <input id="texto" name="nome" class="form-control" placeholder="Enuciado" type="text">
                </div> <!-- form-group// -->
                <table class="table table-striped custab">
                <thead>
                <button  onclick="adicionarAlternativa()" id="addAlternativa" type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#exampleModal"><b>+</b> Adicionar nova Alternativa</button>
                <tr>
                        <th>Texto</th>
                        <th>Valor</th>
                        <th class="text-center">Opções</th>
                    </tr>
                </thead>
                <tbody id="tabelaDeAlternativas">
                </tbody>
                </table>
                <div class="form-group">
                    <button onclick="cadastrarQuestao()" type="button" class="btn btn-primary btn-block"> Cadastrar  </button>
                </div> <!-- form-group// -->                                                           
            </form>
            </article>
            </div> <!-- card.// -->
        </aside> <!-- col.// -->
        <aside class="col-sm-2"></aside>
        <div id="result"></div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nova Alternativa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form>
          <div class="form-group">
          <input type="hidden" id="indexInput">
            <label for="texto-alternativa" class="col-form-label">Texto:</label>
            <input type="text" class="form-control" id="texto-alternativa" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Valor</label>
            <input type="checkbox" class="form-control" id="message-text">
          </div>
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button onclick="salvarAlternativa()" type="button" class="btn btn-primary">Salvar</button>
        </div>
        </div>
    </div>
    </div>
</div>
<script>
    var table = document.getElementById("tabelaDeAlternativas");
    var texto= document.getElementById("texto-alternativa"); 
    var valor= document.getElementById("message-text"); 
    var addAlt;
    function adicionarAlternativa(){
        document.getElementById("exampleModalLabel").innerHTML="Nova Alternativa";
        texto.value="";
        valor.checked=false;
        addAlt=true;
        abrirModal();
    }
    function abrirModal(){
        $('#myModal').modal('show');
    }
    function salvarAlternativa(){
        if (validate(texto)) {
            //colocar na tabela
            var row_number = table.querySelectorAll('tr').length;
            if(addAlt==true){
            inserirLinhaTabela(row_number);
            }else{
                var index=document.getElementById("indexInput").value;
                table.deleteRow(index);
                inserirLinhaTabela(index);
            }

            $('#myModal').modal('hide');
            texto.value="";
            valor.checked=false;
            if(row_number==4){
                document.getElementById("addAlternativa").disabled = true;
            }
        }else{
            alert("Preencha todos os campos");
        }
        
    }
    function inserirLinhaTabela(index){
            var row = table.insertRow(index);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.innerHTML = texto.value;
            cell2.innerHTML = valor.checked;
            cell3.className="text-center";
            var innerValue="<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"excluirAlternativa(" + index + ")\">Excluir</button>";
            var innerValue2="<button style=\"margin-left: 15px;\" type=\"button\" class=\"btn btn-warning btn-xs\" onclick=\"editarAlternativa(" + index + ")\">Editar</button>";
            cell3.innerHTML =  innerValue+innerValue2;
    }
    function validate(campo){

        if (campo.value.trim() !== "") {
            return true;
        }else{
            return false;
        }
    }
    function excluirAlternativa(index){
        table.deleteRow(index);
    }
    function editarAlternativa(index){
        document.getElementById("exampleModalLabel").innerHTML="Editar Alternativa";
        var linha = table.rows[index]
        texto.value=linha.cells[0].innerHTML;
        valor.checked=linha.cells[1].innerHTML=="true"?true:false;
        document.getElementById("indexInput").value=index;
        addAlt=false;
        abrirModal();
    }

    function cadastrarQuestao(){
        var textoQuestao= document.getElementById("texto"); 
        var row_number = table.querySelectorAll('tr').length;
        if (validate(textoQuestao)){
            if(row_number>=2) {
                var objetiva=document.getElementById("tipo1").checked; 
                if(objetiva){
                //Questao objetiva- apenas uma verdadeira
                //contador de questoes verdadeiras
                var numTrue=0;
                for(i=row_number-1;i>=0;i--){
                    var linha = table.rows[i]
                    var valorAlt=linha.cells[1].innerHTML=="true"?true:false;
                    if(valorAlt){
                        numTrue++;
                    }
                }
                console.log(numTrue);
                if(numTrue==1){
                    salvarQuestao();
                }else{
                    alert("Questão objetiva precisa conter exatemente uma questão verdadeira.");
                }
                }else{
                    salvarQuestao();
                }
               
            }else{
                alert("Cadastre ao menos duas alternativas");    
            }
        }else{
            alert("Insira o texto da questao");
        }
    }
    function salvarQuestao(){
        var textoQuestao= document.getElementById("texto").value; 
        var tipo=document.getElementById("tipo1").checked==true?0:1; 
        console.log("tipo"+tipo);
        var questao = {
            metodo:0,
            tipoQ: tipo,
            texto: textoQuestao,
        }

        send(questao,'../Controllers/salvarQuestao.php');
        var id=Number(document.getElementById('result').innerHTML);
        console.log('id: '+id);
        salvarAlternativas(id);
        window.location.href = "questoes.php";
    }
    function salvarAlternativas(idQuestao){
        //pegar numero de linhas na tabela
        var row_number = table.querySelectorAll('tr').length;
        var i;
        //para cada linha da tabela de alternativas, pegar os valores das colunas.
        for(i=row_number-1;i>=0;i--){
            console.log(i);
            var linha = table.rows[i]
            texto.value=linha.cells[0].innerHTML;
            valor.checked=linha.cells[1].innerHTML=="true"?true:false;
            var valorAlt=valor.checked?1:0;
            var alternativa = {
                fk_idQ: idQuestao,
                texto: texto.value,
                vf: valorAlt,
            }
            console.log(JSON.stringify(alternativa));
            send(alternativa,'../Controllers/salvarAlternativas.php');
        }
    }
    function send(classe,urlClass) {
        var id;
        console.log(JSON.stringify(classe));
        //$('#target').html('sending..');
        
        $.ajax({
            
            type: 'post',
            url: urlClass,
            data: JSON.stringify(classe),
            async: false,
            contentType: "application/json; charset=utf-8",
            //traditional: true,
            success: function (data) {
                document.getElementById('result').innerHTML =data;
                console.log('sucess'+data);
            },
            fail: function (data) {
                console.log('fail');
            },
            error: function(xhr, status, error) {
            // var err = JSON.parse(xhr.responseText);
            alert(error+xhr);
            },
            //data: JSON.stringify(class)
        });
    }
</script>
</body>
</html>