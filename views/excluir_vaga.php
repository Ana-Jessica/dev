<?php
include_once("../static/conexao.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $vaga_id = $_GET['id'];

    // Consulta SQL para excluir a vaga
    $excluir_sql = "DELETE FROM vagas WHERE id = ?";
    $stmt = $conn->prepare($excluir_sql);
    $stmt->bind_param("i", $vaga_id);
    $stmt->execute();

    $stmt->close();
}

// Redirecionar de volta para a página de exibição das vagas
header("Location: grid_empresa.php");
exit();
?>
