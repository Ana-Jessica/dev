<?php

session_start();

include_once('../static/conexao.php');

$sql = "SELECT * FROM programador ORDER BY id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../static/ICONS/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../static/ICONS/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../static/ICONS/favicon-16x16.png">
    <link rel="manifest" href="../static/ICONS/site.webmanifest">
    <link rel="mask-icon" href="../static/ICONS/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Area do programador</title>

<body>

    <style>
        body {

            background-image: linear-gradient(to right, #4a007a, #4f0e88, #541a95, #5824a4, #5b2eb2, #5f30bc, #6333c5, #6735cf, #6d2fd5, #7426db, #7c1ae1, #8400e6);

            color: #5F3BC6;

            font-family: 'Crimson Text', serif;

            font-family: 'Lobster', cursive;

            font-family: 'Montserrat', sans-serif;

            font-family: 'Raleway', sans-serif;

            font-size: 20px;

            font-weight: 500;

            text-align: center;

            letter-spacing: 0.05rem;

        }

        .container {

            position: absolute;

            top: 50%;

            left: 50%;

            border: 1px solid black;

            transform: translate(-50%, -50%);

            background-color: rgba(0, 0, 0, 0.3);

            padding: 15px;

            border-radius: 15px;

            width: 1600px;

            height: 95vh;

            text-align: center;

            flex-wrap: nowrap;

        }

        .grid {

            display: grid;

            grid-template-columns: 20% 900px 23%;

            grid-template-rows: 700px 50px;

            grid-column-gap: 5px;

            grid-row-gap: 0px;

        }

        .esquerda {

            border: 1px solid#5F3BC6;

            text-align: center;

            height: 93vh;

            border-radius: 18px;

            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.7);

            border: 1px solid rgba(255, 255, 255, 0.18);

            background-color: aliceblue;

        }

        #logo img {
            width: 100%;
            border-radius: 18px;
        }

        .info.login,
        .info.signup {
            display: none;
        }

        .direita {

            border: 1px solid#5F3BC6;

            text-align: center;

            height: 93vh;

            border-radius: 18px;

            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.7);

            border: 1px solig rgba(255, 255, 255, 0.18);

            background-color: aliceblue;

        }

        .programadores {
            width: 100%;
        }

        .quarta {

            border: 1px solid #5F3BC6;

            border-radius: 8px;

            border: 1px solid#5F3BC6;

            text-align: center;

            height: 68vh;

            border-radius: 18px;

            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.7);

            border: 1px solig rgba(255, 255, 255, 0.18);

            background-color: aliceblue;

        }

        li {

            list-style: none;

        }

        button {

            background-color: transparent;

            width: 70%;

            height: 40px;

            border: none;

            color: #5F3BC6;

            font-size: 15px;

            cursor: pointer;

        }

        button:hover {

            border: 1px solid #5F3BC6;

        }

        #terceira {

            margin: auto;

            background-color: aliceblue;

            height: 20vh;

            width: 98%;

            border-radius: 18px;

            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.7);

            border: 1px solig rgba(255, 255, 255, 0.18);

        }

        span {

            margin-left: 5px;

            color: #5F3BC6;

        }

        h1 {

            text-align: center;

            margin: auto;

            padding: auto;

        }

        p {

            padding-top: 50px;

            text-indent: 20px;

            color: #5F3BC6;

            text-align: justify;

            margin: 10px;

        }

        a:link {

            color: #5F3BC6;

            font-family: Candara;

            text-decoration: none;

        }

        a:hover {

            font-weight: bolder;

            border-radius: 5px;

        }

        .nav {

            width: 60%;

            margin: auto;

            text-align: center;

            display: flex;

            justify-content: space-around;

        }

        .nav-link {

            transition: 0.1s;

        }

        .btn-outline-success {

            background-color: white;

            border-radius: 5px;

            width: 70px;

            height: 38px;

            border: none;

            outline: none;

            font-size: 15px;

        }

        .seguidor {
            display: flex;
            /* Isso faz com que os elementos dentro da div se alinhem horizontalmente */
            margin-left: 10%;
            align-items: center;
            /* Alinha verticalmente os elementos no centro */
            margin-bottom: 10px;
            /* Espaçamento entre cada seguidor */
        }

        .dev {
            margin: 0;
            /* Remove as margens padrão para o nome */
        }

        .btn-outline-success:hover {

            background: #e40189;

            border: 1px solid #e40189;

            border-radius: 5px;

            cursor: pointer;

            color: white;

        }

        .form-control {

            border-radius: 5px;

            width: 600px;

            height: 39px;

            border: none;

            outline: none;

            margin: 0;

            font-size: 16px;

        }

        .form-select {

            border-radius: 5px;

            width: 180px;

            height: 39px;

            text-align: center;

            border: none;

            outline: none;

            font-size: 16px;

        }

        h2 {

            text-align: center;

        }

        #estrelas {

            text-align: center;

            height: 80px;

        }

        h2 {

            text-align: center;

        }


        #terceira img {

            height: 20vh;

            float: right;

        }

        h1>.ola {

            float: left;

            padding-left: 10%;

        }

        .titulo {

            font-size: 25px;

            color: #5F3BC6;

        }

        .box {

            width: 90%;

            height: 80px;

            border: 1px solid #5F3BC6;

            background-color: #f1f1f1;

            border-radius: 5px;

            padding: 0;

            margin: 20px;

            display: flex;

            font-size: 18px;

        }

        .imagem {

            width: 50px;

            height: 50px;

            border-radius: 50%;
            margin-left: -200px;

            /* To make the image circular, if desired */

        }

        #box {

            display: grid;

            grid: repeat(2, 200px) / auto-flow 195px;

            justify-content: space-evenly;

            padding: 1%;

            margin-right: 15%;

            grid-column-gap: 80px;

        }

        #box>div {

            background-color: rgb(0, 0, 0, 0.1);

            width: 260px;

            height: 180px;

            border-radius: 10px;

            text-align: center;

            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1));

            -webkit-backdrop-filter: blur(20px);

            backdrop-filter: blur(20px);

            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.7);

            border: 1px solig rgba(255, 255, 255, 0.18);

            color: #5F3BC6;

        }

        #box img {

            width: 260px;

            height: 180px;

            border-radius: 10px;

        }
    </style>

    </head>

    <body>

        <div class="container">

            <div class="grid">

                <div class="esquerda">

                    <div id="logo">

                        <img src="../static/imgs/LOGO15.PNG">

                    </div>

                    <hr>

                    <div class="segunda">

                        <div class="parte1">

                            <ul>

                                <div>Ferramentas</div><br>

                                <li><a href="sobrevagas.php"><button><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-laptop"
                                                viewBox="0 0 16 16">

                                                <path
                                                    d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z" />

                                            </svg> Ver vagas</button></a></li>
                                <li><a href="http://localhost:3000/index_chat">chat</a></li>

                                <li><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">

                                            <path
                                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />

                                            <path
                                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />

                                        </svg><a href="excluir.php"> Configurações </a></button></li>
                            </ul>
                        </div>

                        <br>

                        <hr>

                        <div class="parte2">

                            <ul>

                                <div>Contatos</div><br>

                                <li><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">

                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />

                                        </svg><a href="chat.html">Inbox</a></button></li>

                                <li><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">

                                            <path
                                                d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />

                                            <path
                                                d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />

                                        </svg><a href="catalogo_devs.html"> Comentários</a></button></li>
                                <li><a href="../index.html">Pagina principal</a></li>
                            </ul>

                        </div>

                    </div>

                </div>

                <div class="meio">

                    <div id="terceira">

                        <h1>

                            Olá , Dev!

                        </h1>

                        <img
                            src="../static/imgs/3D_young_people_working_on_computer_Illustration_in_PNG__SVG-removebg-preview.png">

                    </div>
                    <br>

                    <br>
                    <div class="quarta">
                        <div class="titulo">
                            <b> Meus Trabalhos</b>
                            <br>
                        </div>
                        <br><br><br>
                        <div id="box">
                            <div><img src="../static/imgs/1.jpeg"></div>

                            <div><img src="../static/imgs/2.jpeg"></div>

                            <div><img src="../static/imgs/3.jpeg"></div>

                            <div><img src="../static/imgs/4.jpeg"></div>

                        </div>
                    </div>
                </div>
                <div class="direita">
                    <h2> Devs cadastrados</h2>
                    <br>
                    <?php
                    echo '<div class="seguidores">';
                    while ($user_data = mysqli_fetch_assoc($result)) {
                        echo '<div class="seguidor">';
                        echo '<h2 class="dev">' . $user_data['nome'] . '</h2>';
                        echo '</div>';
                        echo '<hr>';
                    }
                    echo '</div>';


                    ?>
                </div>
            </div>
        </div>
        </div>
        <script>
            var search = document.getElementById('search');
            function searchData() {
                window.location = "programadores.php?search=" + search.value;
            }
        </script>
    </body>

</html>