<?php
include_once("template/header.php");
?>

<div class="container col-md-4">
    <?php include_once("template/buttonback.html"); ?>
   
    <h1 id="main-title">Editar contato</h1>
    <form id="edit-form" action="<?= $BASE_URL ?>config/process.php" method="POST" >
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">

        <div class="form-group">
            <label for="name">Nome do Contato:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome." value="<?= $contact["name"] ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email." value="<?= $contact["email"] ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Digite aqui o número. Ex:(00)0000000000" value="<?= $contact["phone"] ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Digite a descrição do contato. Ex: Fornecedor de baterias." rows="3"><?= $contact["description"] ?></textarea>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>


 

<?php
include_once("template/footer.php");
?>
