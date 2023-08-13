<?php
session_start();
include_once('../static/conexao.php');

if (!empty($_GET['search'])) {
  $search = $_GET['search'];
  $sql = "SELECT * FROM programador WHERE nome LIKE '%$search%' ORDER BY id";
} else {
  $sql = "SELECT * FROM programador ORDER BY id";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Programadores</title>
  <link rel="apple-touch-icon" sizes="180x180" href="../static/ICONS/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../static/ICONS/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../static/ICONS/favicon-16x16.png">
  <link rel="manifest" href="../static/ICONS/site.webmanifest">
  <link rel="mask-icon" href="../static/ICONS/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <style>
    body {
      background-image: linear-gradient(to right top, #4a007a, #4f0e88, #541a95, #5824a4, #5b2eb2, #5f30bc, #6333c5, #6735cf, #6d2fd5, #7426db, #7c1ae1, #8400e6);
      background-repeat: no-repeat;
      background-size: cover;
      min-height: 100vh;
    }

    .nav {
      width: 60%;
      margin: auto;
      text-align: center;
      display: flex;
      justify-content: space-around;
    }

    .pesquisa {
      height: 52px;
      display: flex;
    }

    .botao {
      background-color: white;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      width: 40px;
      height: 40px;
      border: none;
      outline: none;
      font-size: 15px;
      text-decoration: none;
      color: #4a007a;
    }

    .botao:hover {
      background: #e40189;
      border: 1px solid #e40189;
      cursor: pointer;
      color: white;
      display: block;
      text-decoration: none; 
    }
    a{
      text-decoration: none;
    }
    .pesquisar_insira {
      width: 600px;
      height: 40px;
      display: block;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      outline: #5824a4;
      padding-left: 2%;
      border:none;
    }

    .saber {
      background: #5F3BC6;
      font-weight: bold;
      width: 130px;
      height: 40px;
      border: 1px solid white;
      color: white;
      float: right;
      border-radius: 20px;
      font-size: 15px;
      transition: 0.5s;
      margin-right: 10px;
    }

    .saber:hover {
      background: #e40189;
      border: 1px solid white;
      color: white;
      border-radius: 20px;
      transition: 0.5s;
    }



    .voltar {
      text-align: center;
      background: white;
      width: 165px;
      height: 28px;
      border: 1px solid white;
      color: #5F3BC6;
      border-radius: 20px;
      font-size: 14px;
      transition: 0.4s;
      margin-left: 40px;
      margin-top: 20px;
    }

    .voltar:hover {
      background: #e40189;
      border: 1px solid #e40189;
      color: white;
      border-radius: 20px;
      margin-top: 20px;
    }

    .lupa {
      height: 20px;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      max-width: 1200px;
      margin: 0 auto;
      padding: 10px;
    }

    .box {
      width: 750px;
      height: 50px;
      border: 1px solid #5F3BC6;
      background-color: #f1f1f1;
      border-radius: 5px;
      padding: 20px;
      margin: 10px;
      display: flex;
      font-size: 20px;
    }

    .saiba-mais {
      background: white;
      width: 165px;
      height: 28px;
      border: 1px solid white;
      color: #5F3BC6;
      border-radius: 20px;
      font-size: 14px;
      transition: 0.4s;

      margin-right: 10px;
      margin-top: 5%; 
    }

    .saiba-mais:hover {
      background: #e40189;
      border: 1px solid #e40189;
      color: white;
      border-radius: 20px;
    }


    /* .imagem {
        width: 50px;
        height: 50px;
        margin-right: 20px;
        border-radius: 50%;
    } */
    .titulo {
    margin-left: 5%;
    margin-top: 0;
    width: 100%;
    }
    .sair {
      background-color: white;
      border-radius: 5px;
      width: 40px;
      height: 40px;
      border: none;
      outline: none;
      font-size: 15px;
      text-decoration: none;
      color: #4a007a;
    }

    .sair:hover {
      background: #e40189;
      border: 1px solid #e40189;
      cursor: pointer;
      color: white;
      display: block;
      text-decoration: none; 
    }
    @media screen and (max-width: 768px) {
      .box {
        width: 100%;
        height: 50px;
        font-size: 16px;
      }

      .pesquisar_insira {
        width: 80vw;
        height: 40px;
        display: block;
        border-radius: 5px;
        outline: #5824a4;
        padding-left: 2%;
      }
    }

    @media screen and (max-width: 576px) {
      .box {
        width: 100%;
        height: 50px;
        margin: 10px;
        font-size: 14px;
      }

      .container {
        justify-content: center;
      }

      .pesquisar_insira {
        width: 80vw;
        height: 40px;
        display: block;
        border-radius: 5px;
        outline: #5824a4;
        padding-left: 2%;
      }
    }
  </style>
</head>

<body>
<a href="../index.html"><button class="sair" type="button">Sair</button></a>
  <div class="nav">
    <nav class="navbar bg-body-tertiary">
      <form class="pesquisa" role="search" onsubmit="searchData(); return false;">
        <input class="pesquisar_insira" type="search" id="search" placeholder="Insira sua busca" aria-label="Search">
        <button class="botao" type="submit"><img src="../static/imgs/icons8-lupa-30.png" class="lupa"></button>
      </form>
    </nav>
  </div>
  <div class="container">
    <?php
    while ($user_data = mysqli_fetch_assoc($result)) {
      echo '<div class="box">';
      // echo '<img class="imagem" src="data:image/jpeg;base64,' . base64_encode($user_data['imagem_foto']) . '>';
      echo '<h2 class="titulo">' . $user_data['nome'] . '</h2>';
      echo '<a href="grid_dev.php"><button class="saiba-mais">Ver perfil</button></a>';
      echo '</div>';
    }
    ?>
  </div>
  <script>
    var search = document.getElementById('search');

    function searchData() {
      window.location = "programadores.php?search=" + search.value;
    }
  </script>
</body>

</html>