<?php
include 'config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $autor = mysqli_real_escape_string($conexao, $_POST['autor']);
    $genero = mysqli_real_escape_string($conexao, $_POST['genero']);
    $ano_publicacao = mysqli_real_escape_string($conexao, $_POST['ano_publicacao']);

    $sql = "INSERT INTO livros (titulo, autor, genero, ano_publicacao) VALUES ('$titulo', '$autor', '$genero', '$ano_publicacao')";

    if (mysqli_query($conexao, $sql)) {
        header("Location: index.php");
    } else {
        echo "Erro ao adicionar livro: " . mysqli_error($conexao);
    }
}

include 'templates/header.php';
?>

<h1>Adicionar Novo Livro</h1>

<form action="adicionar.php" method="post">
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>
    <div class="mb-3">
        <label for="autor" class="form-label">Autor</label>
        <input type="text" class="form-control" id="autor" name="autor" required>
    </div>

    <?php
    
    $generos = ['Aventura', 'Autoajuda', 'Biografia', 'Distopia', 'Drama', 'Fantasia', 'Ficção Científica', 'Histórico', 'Infantil', 'Mistério', 'Não-Ficção', 'Poesia', 'Policial', 'Romance', 'Sátira', 'Suspense', 'Terror'];
    ?>
    <div class="mb-3">
        <label for="genero" class="form-label">Gênero</label>
        <select class="form-select" id="genero" name="genero">
            <option selected disabled>Selecione um gênero...</option>
            <?php
            
            foreach ($generos as $genero) {
                echo "<option value=\"$genero\">$genero</option>";
            }
            ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
        <input type="number" class="form-control" id="ano_publicacao" name="ano_publicacao" min="1000" max="2099" step="1">
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include 'templates/footer.php'; ?>