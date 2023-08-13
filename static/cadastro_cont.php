<?php 
include_once("conexao.php");

    $nome = $_POST['nome'];
    $empresa = $_POST['nomeEmpresa'];
    $sobreEmpresa = $_POST['sobreEmpresa'];
    $email = $_POST['email'];
    $verificar_sql = "SELECT email FROM contratante WHERE email = ? 
                  UNION
                  SELECT email FROM programador WHERE email = ?";
    $verificar_stmt = $conn->prepare($verificar_sql);
    $verificar_stmt->bind_param("ss", $email, $email); 
    $verificar_stmt->execute();


if ($verificar_stmt->fetch()) {
    ?>
    <script>
    alert("Nao foi possivel fazer cadastro, ja existe um usuario com esse email.");
    window.location.href = "../views/cadastrar.html";
</script>
<?php
    exit;
}


$cnpj = $_POST['cnpj'];
$senha = $_POST['senha'];

if (isset($_FILES['imagem_logo']['error']) && $_FILES['imagem_logo']['error'] === 0) {
    $imagem = file_get_contents($_FILES['imagem_logo']['tmp_name']);
} else {
    // Default image if no logo is uploaded
    $defaultImagePath = 'path_to_default_image.jpg';
    $imagem = file_get_contents($defaultImagePath);
}

$inserir = "insert into contratante values(null,'$imagem','$nome','$empresa','$sobreEmpresa','$email','$cnpj','$senha')";
$stmt = $conn->prepare($inserir);
$conexao = mysqli_query($conn, $inserir);
// if ($conexao){
//     echo "Registro inserido com sucesso!";
// }else{
//     echo "Falha na inserção dos dados".mysqli_connect_errno();
// }
mysqli_close($conn);
?>
<script>
    alert("Cadastro efetuado com sucesso! Bem-vindo(a) a equipe <?php echo $nome; ?>!");
    window.location.href = "../views/login.html";
</script>