<?php
session_start();
if(!isset($_SESSION["id"])){
  header('Location: ../Views/logout.php');
}
?>
<div class="barralateral">
<nav class="navbar navbar-expand-lg navbar-dark p-3 mb-2 bg-info text-white fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">Engenharia de Software</span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="/ProjetoEngenhariaDeSoftware/app/Views/resources/img/11.jpg" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/ProjetoEngenhariaDeSoftware/app/Views/home/">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/ProjetoEngenhariaDeSoftware/app/Views/provas.php">Gerenciar Provas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/ProjetoEngenhariaDeSoftware/app/Views/questoes.php">Gerenciar Questões</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#vEstat">Visualizar Estatistica de Provas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/ProjetoEngenhariaDeSoftware/app/Controllers/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
</div>