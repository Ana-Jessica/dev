<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    header('Location: ../views/cadastrar.html');
} else {
    include_once('conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM programador WHERE email = '$email' and senha = '$senha'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['user_id']);
        ?>
        <script>
            alert("A senha ou o email estão incorretos.");
            window.location.href = "../views/login.html";
        </script>
        <?php
    } else {
        $row = $result->fetch_assoc();
        $user_id = $row['id'];

        // Defina o cookie com o ID do usuário
        setcookie('user_id', $user_id, time() + (86400 * 30), "/"); // Expira em 30 dias

        // Redirecione para a rota correta após o login
        header('Location: ../views/grid_dev.php');
    }
}

?>