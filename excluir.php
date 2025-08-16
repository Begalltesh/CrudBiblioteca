<?php
include 'config/conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM livros WHERE id = $id";

if (mysqli_query($conexao, $sql)) {
    header("Location: index.php");
} else {
    echo "Erro ao excluir livro: " . mysqli_error($conexao);
}
?>