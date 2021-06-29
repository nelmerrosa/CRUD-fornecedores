<?php
include_once("template/header.php");
?>

<div class="container col-md-4">
    <?php include_once("template/buttonback.html"); ?>
    <h1 id="main-title">Adicionar contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="create">
        
        <div class="form-group">
            <label for="name">Nome do Contato:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome." required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email." required>
        </div>

        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Digite aqui o número. Ex:(00)0000000000" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Digite a descrição do contato. Ex: Fornecedor de baterias." rows="3"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>


<?php
include_once("template/footer.php");
?>