# Sistema CRUD de Biblioteca em PHP e MySQL

Sistema simples para gerenciar livros, permitindo as quatro operações básicas (Criar, Ler, Atualizar e Excluir). Ideal para estudos e portfólio de desenvolvedores júnior.

## Tecnologias Utilizadas
* PHP 8+
* MySQL
* HTML5
* CSS3
* Bootstrap 5

## Como Instalar e Executar o Projeto

1.  **Clone o repositório:**
    ```bash
    git clone [https://github.com/seu-usuario/nome-do-repositorio.git](https://github.com/seu-usuario/nome-do-repositorio.git)
    ```

2.  **Crie o Banco de Dados:**
    * Abra o phpMyAdmin (ou outro cliente MySQL).
    * Crie um novo banco de dados chamado `biblioteca`.

3.  **Importe o arquivo SQL:**
    * Com o banco de dados `biblioteca` selecionado, vá para a aba **"Importar"**.
    * Clique em "Escolher arquivo" e selecione o arquivo `biblioteca.sql` que está na raiz deste projeto.
    * Clique em "Executar" no final da página.

4.  **Configure a Conexão:**
    * Abra o arquivo `config/conexao.php`.
    * Se necessário, altere as variáveis `$servidor`, `$usuario`, `$senha` e `$banco` para corresponder às suas credenciais do MySQL.

5.  **Execute o Projeto:**
    * Inicie seu servidor local (XAMPP, WAMP, etc.).
    * Abra o projeto no seu navegador (ex: `http://localhost/biblioteca`).
