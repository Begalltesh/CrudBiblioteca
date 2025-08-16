<?php
include 'config/conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM livros WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);
$livro = mysqli_fetch_assoc($resultado);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $autor = mysqli_real_escape_string($conexao, $_POST['autor']);
    $genero = mysqli_real_escape_string($conexao, $_POST['genero']);
    $ano_publicacao = mysqli_real_escape_string($conexao, $_POST['ano_publicacao']);
    $sql = "UPDATE livros SET titulo='$titulo', autor='$autor', genero='$genero', ano_publicacao='$ano_publicacao' WHERE id=$id";

    if (mysqli_query($conexao, $sql)) {
        header("Location: index.php");
    } else {
        echo "Erro ao atualizar livro: " . mysqli_error($conexao);
    }
}

include 'templates/header.php';
?>

<h1>Editar Livro</h1>

<form action="editar.php?id=<?php echo $id; ?>" method="post">
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo htmlspecialchars($livro['titulo']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="autor" class="form-label">Autor</label>
        <input type="text" class="form-control" id="autor" name="autor" value="<?php echo htmlspecialchars($livro['autor']); ?>" required>
    </div>
    
    <?php
    
    $generos = ['Aventura', 'Autoajuda', 'Biografia', 'Distopia', 'Drama', 'Fantasia', 'Ficção Científica', 'Histórico', 'Infantil', 'Mistério', 'Não-Ficção', 'Poesia', 'Policial', 'Romance', 'Sátira', 'Suspense', 'Terror'];
    
    
    $genero_atual = $livro['genero'];
    ?>
    <div class="mb-3">
        <label for="genero" class="form-label">Gênero</label>
        <select class="form-select" id="genero" name="genero">
            <option disabled>Selecione um gênero...</option>
            <?php
            
            foreach ($generos as $genero) {
                
                $selecionado = ($genero == $genero_atual) ? 'selected' : '';
                
                echo "<option value=\"$genero\" $selecionado>$genero</option>";
            }
            ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
        <input type="number" class="form-control" id="ano_publicacao" name="ano_publicacao" value="<?php echo htmlspecialchars($livro['ano_publicacao']); ?>" min="1000" max="2099" step="1">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include 'templates/footer.php'; ?>