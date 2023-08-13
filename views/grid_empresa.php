<?php
session_start();
include_once('../static/conexao.php');

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM vagas WHERE contratante_id = $user_id";
$sql1 = "SELECT * FROM contratante WHERE id = $user_id";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
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
    <title>Empresa</title>
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
            width: 1300px;
            height: 95vh;
            text-align: center;
            flex-wrap: nowrap;
        }

        .grid {
            display: grid;
            grid-template-columns: 20% 80%;
            grid-template-rows: 780px 50px;
            grid-column-gap: 5px;
            grid-row-gap: 0px;
        }

        .esquerda {
            border: 1px solid#5F3BC6;
            text-align: center;
            height: 94vh;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.7);
            border: 1px solig rgba(255, 255, 255, 0.18);
            background-color: aliceblue;
        }

        .direita {
            border: 1px solid #5F3BC6;
            border-radius: 8px;
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
            height: 30vh;
            width: 98%;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.7);
            border: 1px solig rgba(255, 255, 255, 0.18);
        }

        #box {
            margin: auto;
            background-color: aliceblue;
            height: 61vh;
            margin-top: 3vh;
            width: 98%;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.7);
            border: 1px solig rgba(255, 255, 255, 0.18);
        }


        #box img {
            width: 100px;
            height: 100px;
            border-radius: 25%;
        }

        /* Hide the radio buttons */
        .slide-controls input[type="radio"] {
            display: none;
        }

        /* Styling for the labels */
        .slide-controls label {
            display: inline-block;
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            /* Add a transparent underline */
        }

        /* Styling for the selected label */
        .slide-controls input[type="radio"]:checked+label {
            border-color: #007bff;
            /* Change the border color to indicate selection */
        }

        /* Slide Tabs */
        .slider-tab {
            height: 2px;
            width: 50%;
            background: #007bff;
            position: relative;
            top: -2px;
            transform: translateX(50%);
        }

        /* Hide the login and signup forms by default */
        .info.login,
        .info.signup {
            display: none;
        }

        /* Show the selected form */
        .info.show {
            display: block;
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

        #divBusca {
            background-color: rgba(255, 255, 255, 0.18);
            border: solid 2px #5F3BC6;
            border-radius: 8px;
            width: 590px;
            height: 54px;
            padding-left: 15%;
            color: #fff;
        }

        #txtBusca {
            float: left;
            background-color: transparent;
            padding-left: 5px;
            font-size: 18px;
            border: none;
            height: 32px;
        }

        #btnBusca {
            border: none;
            float: right;
            height: 54px;
            border-radius: 0 8px 8px 0;
            width: 75px;
            font-weight: bold;
            background: #5F3BC6;
        }

        #divBusca img {
            float: left;
            height: 45px;
        }

        h2 {
            text-align: center;
        }

        #seguidores img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            float: left;
        }

        #seguidores button {
            border: 1px solid #5F3BC6;
            border-radius: 6px;
            width: 20%;
            height: 25px;
            float: right;
        }

        #seguidores div {
            font-size: 18px;
            /* border: 1px solid black; */
            text-align: center;
            height: 45px;
        }

        #logo img {
            height: 54px;
            border-radius: 8px;
        }

        #terceira img {
            height: 20vh;
            float: right;
        }

        h1>.bem-vindo {
            float: left;
            padding-left: 10%;
        }

        .titulo {
            font-size: 25px;
            text-align: center;
            margin-right: 50%;
        }
        .excluir{
            margin-top: 30px;
        }
        .titulo1 {
            font-size: 25px;
            text-align: center;
        }
        .box {
            width: 90%;
            height: 80px;
            border: 1px solid #5F3BC6;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            display: flex;
            font-size: 18px;
            
        }

        .imagem img{
            width: 50px;
            height: 50px;
            margin: 10px;
            border-radius: 50%;
            /* To make the image circular, if desired */
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
                            <li><a href="criar_vaga.php"><button><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-plus-square"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg> Criar Vaga</button></li></a>
                            <li><a href="programadores.php"><button><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                                            <path
                                                d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z" />
                                        </svg> Ver Devs</button></a></li>
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
                                    </svg>
                                    <path
                                        d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    <path
                                        d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                                    </svg> Comentários
                                </button></li>
                            <li> <a href="../index.html"><button class="sair" type="button">Sair</button></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="meio">
                <div id="terceira">
                    <br><br>
                    <h1 class="bem-vindo">Bem Vindo! </h1>
                    <img src="../static/imgs/job-removebg-preview.png">
                </div>
                <div class="quarta">
                    <div id="box">
                        <div class="slide-controls">
                            <input type="radio" name="slide" id="productA" checked>
                            <input type="radio" name="slide" id="productB">
                            <label for="productB" class="slide productB">Sobre a Empresa</label>
                            <label for="productA" class="slide productA">Vagas ofertadas</label>
                            <div class="slider-tab"></div>
                        </div>
                        <div class="info-container">
                            <div class="info login">
                                <?php
                                while ($user_data = mysqli_fetch_assoc($result1)) {
                                    echo '<h2 class="titulo1">' . $user_data['nomeEmpresa'] . '</h2>';
                                    echo '<p class="sobre">' . $user_data['sobreEmpresa'] . '</p>';
                                }
                                ?>
                            </div>
                            <div class="info signup">
                                <?php
                                while ($user_data = mysqli_fetch_assoc($result)) {
                                    echo '<div class="box">';
                                    echo '<img class="imagem" src="data:image/jpeg;base64,' . base64_encode($user_data['imagem']) . '" alt="Imagem da vaga">';
                                    echo '<h2 class="titulo">' . $user_data['titulo'] . '</h2>';
                                        echo "<div class='excluir'>
                                            <a class='btn btn-danger' href='excluir_vaga.php?id=$user_data[id]'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                            <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
                                          </svg>
                                            </a>
                                      </div>";
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <script>
                        const loginForm = document.querySelector(".login");
                        const signupForm = document.querySelector(".signup");
                        const productABtn = document.querySelector(".productA");
                        const productBBtn = document.querySelector(".productB");

                        productBBtn.onclick = () => {
                            loginForm.classList.add("show");
                            loginForm.classList.remove("collapse");
                            signupForm.classList.add("collapse");
                            signupForm.classList.remove("show");
                        };

                        productABtn.onclick = () => {
                            loginForm.classList.add("collapse");
                            loginForm.classList.remove("show");
                            signupForm.classList.add("show");
                            signupForm.classList.remove("collapse");
                        };
                    </script>
</body>

</html>