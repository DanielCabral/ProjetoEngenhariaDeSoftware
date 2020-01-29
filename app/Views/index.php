<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <style>
        body { 
            background: url(/ProjetoEngenhariaDeSoftware/app/Views/resources/img/fundo.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .spacer {
            margin-top: 140px; /* define margin as you see fit */
        }
    </style>

</head>
<body>
<div class="container">
    <div class="row spacer">
        <div class="span4"></div>
        <div class="span4"></div>
        <div class="span4"></div>
    </div>
    <div class="row">
    <br><br><br>
 
    <aside class="col-sm-4">
    </aside>
        <aside class="col-sm-4">
        <div class="card">
        <article class="card-body">
        <a href="signup.php" class="float-right btn btn-outline-primary">Cadastro</a>
        <h4 class="card-title mb-4 mt-1">Login</h4>
            <form action="../Controllers/login.php" method="post">
                <div class="form-group">
                    <label>Seu login</label>
                    <input name="email" class="form-control" placeholder="Email" type="text">
                </div> <!-- form-group// -->
                <div class="form-group">
                    <a class="float-right" href="#">Esqueceu?</a>
                    <label>Sua senha</label>
                    <input name="senha" class="form-control" placeholder="******" type="password">
                </div> <!-- form-group// --> 
                <div class="form-group"> 
                <div class="checkbox">
                <label> <input type="checkbox"> Salvar Senha </label>
                </div> <!-- checkbox .// -->
                </div> <!-- form-group// -->  
                <label>Tipo: </label>
                <div class="radio">
                <label><input type="radio" name="tipo" value="0" checked>Aluno</label>
                </div>
                <div class="radio">
                <label><input type="radio" name="tipo" value="1">Professor</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Login  </button>
                </div> <!-- form-group// -->                                                           
            </form>
            </article>
            </div> <!-- card.// -->
        </aside> <!-- col.// -->
        <aside class="col-sm-4"></aside>
    </div>

</div>
</body>
</html>