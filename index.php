<?php
include 'config/conexao.php';
include 'templates/header.php';


$generos = ['Aventura', 'Autoajuda', 'Biografia', 'Distopia', 'Drama', 'Fantasia', 'Ficção Científica', 'Histórico', 'Infantil', 'Mistério', 'Não-Ficção', 'Poesia', 'Policial', 'Romance', 'Sátira', 'Suspense', 'Terror'];

$sql = "SELECT * FROM livros";
$params = [];
$types = '';

if (isset($_GET['filtro_valor']) && $_GET['filtro_valor'] !== '') {
    $coluna = $_GET['filtro_coluna'];
    $valor = $_GET['filtro_valor'];
    $colunas_permitidas = ['autor', 'genero', 'ano_publicacao'];

    if (in_array($coluna, $colunas_permitidas)) {
        if ($coluna == 'autor') {
            $sql .= " WHERE autor LIKE ?";
            $types .= 's';
            $params[] = "%" . $valor . "%";

        } else {
            $sql .= " WHERE $coluna = ?";
            $types .= ($coluna == 'ano_publicacao') ? 'i' : 's';
            $params[] = $valor;
        }
    }
}

$stmt = mysqli_prepare($conexao, $sql);
if (!empty($params)) {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

$filtro_coluna_selecionada = isset($_GET['filtro_coluna']) ? $_GET['filtro_coluna'] : 'autor';
$filtro_valor_digitado = isset($_GET['filtro_valor']) ? htmlspecialchars($_GET['filtro_valor']) : '';
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista de Livros</h1>
    <a href="adicionar.php" class="btn btn-primary">Adicionar Novo Livro</a>
</div>

<div class="card bg-light mb-4">
    <div class="card-body">
        <form action="index.php" method="get" class="row g-3 align-items-center">
            <div class="col-md-3">
                <label for="filtro_coluna" class="form-label">Buscar por:</label>
                <select name="filtro_coluna" id="filtro_coluna" class="form-select">
                    <option value="autor" <?php if ($filtro_coluna_selecionada == 'autor') echo 'selected'; ?>>Autor</option>
                    <option value="genero" <?php if ($filtro_coluna_selecionada == 'genero') echo 'selected'; ?>>Gênero</option>
                    <option value="ano_publicacao" <?php if ($filtro_coluna_selecionada == 'ano_publicacao') echo 'selected'; ?>>Ano de Publicação</option>
                </select>
            </div>
            <div class="col-md-7">
                <label for="filtro_valor" class="form-label">Termo da Busca:</label>
                
                <input type="text" name="filtro_valor" id="filtro_valor_texto" class="form-control" value="<?php echo $filtro_valor_digitado; ?>" placeholder="Digite sua busca...">

                <select name="filtro_valor" id="filtro_valor_genero" class="form-select" style="display: none;">
                    <option value="">Todos os Gêneros</option>
                    <?php
                    foreach ($generos as $genero) {
                        $selected = ($filtro_valor_digitado == $genero) ? 'selected' : '';
                        echo "<option value=\"$genero\" $selected>$genero</option>";
                    }
                    ?>
                </select>

            </div>
            <div class="col-md-2 d-flex align-items-end">
                <div class="d-grid gap-2 w-100">
                    <button type="submit" class="btn btn-dark">Buscar</button>
                    <a href="index.php" class="btn btn-outline-secondary">Limpar Filtro</a>
                </div>
            </div>
        </form>
    </div>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Ano de Publicação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($resultado) > 0) {
            while ($livro = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $livro['id'] . "</td>";
                echo "<td>" . htmlspecialchars($livro['titulo']) . "</td>";
                echo "<td>" . htmlspecialchars($livro['autor']) . "</td>";
                echo "<td>" . htmlspecialchars($livro['genero']) . "</td>";
                echo "<td>" . htmlspecialchars($livro['ano_publicacao']) . "</td>";
                echo "<td>
                        <a href='editar.php?id=" . $livro['id'] . "' class='btn btn-warning btn-sm btn-acao'>Editar</a>
                        <a href='excluir.php?id=" . $livro['id'] . "' class='btn btn-danger btn-sm btn-acao' onclick='return confirm(\"Tem certeza que deseja excluir este livro?\")'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            if (!empty($filtro_valor_digitado)) {
                echo "<tr><td colspan='6' class='text-center'>Nenhum resultado encontrado para sua busca.</td></tr>";
            } else {
                echo "<tr><td colspan='6' class='text-center'>Nenhum livro cadastrado.</td></tr>";
            }
        }
        ?>
    </tbody>
</table>

<script>
    const filtroColuna = document.getElementById('filtro_coluna');
    const inputTexto = document.getElementById('filtro_valor_texto');
    const selectGenero = document.getElementById('filtro_valor_genero');

    function atualizarTipoDeFiltro() {
        const tipoSelecionado = filtroColuna.value;

        if (tipoSelecionado === 'genero') {
            inputTexto.style.display = 'none';
            inputTexto.disabled = true; 
            
            selectGenero.style.display = 'block';
            selectGenero.disabled = false; 
        } else {
            inputTexto.style.display = 'block';
            inputTexto.disabled = false;
            
            selectGenero.style.display = 'none';
            selectGenero.disabled = true;
            if (tipoSelecionado === 'ano_publicacao') {
                inputTexto.type = 'number';
                inputTexto.placeholder = 'Ex: 1997';
            } else {
                inputTexto.type = 'text';
                inputTexto.placeholder = 'Digite sua busca...';
            }
        }
    }

    filtroColuna.addEventListener('change', atualizarTipoDeFiltro);

    document.addEventListener('DOMContentLoaded', atualizarTipoDeFiltro);
</script>

<?php include 'templates/footer.php'; ?>