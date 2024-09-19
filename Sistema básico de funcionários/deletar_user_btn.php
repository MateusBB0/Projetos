<!-- Botão de deletar usuário na página "pag_admin.php" -->
<?php
session_start();
include('conectar_mat.php');

if (isset($_SESSION['admin_logged_in']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $identificacao = $_POST['identificacao'];

    $sql = "DELETE FROM tb_funcionarios WHERE identificacao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $identificacao);

    if ($stmt->execute()) {
        header('Location: pag_admin.php');
    } else {
        echo "Erro ao deletar funcionário: " . $conn->error;
    }
} else {
    header('Location: entrar_admin.php');
    exit;
}
?>
