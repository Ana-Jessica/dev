<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    header('Location: ../views/cadastrar.html');
} else {
    include_once('conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM contratante WHERE email = '$email' and senha = '$senha'";
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
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;

        // Aqui você já possui o ID do usuário após a autenticação
        $row = $result->fetch_assoc();
        $user_id = $row['id'];

        // Armazene o user_id na sessão
        $_SESSION['user_id'] = $user_id;

        // Continuar com o resto do código, como redirecionamento após autenticação, etc.
        header('Location: ../views/grid_empresa.php');
    }
}
?>
