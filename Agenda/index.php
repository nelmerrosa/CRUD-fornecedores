<?php
include_once("template/header.php");
?>

<div class="container">

    <?php if (isset($printMsg) && $printMsg != '') : ?>
        <p id="msg"><?= $printMsg ?></p>
    <?php endif; ?>
    <h1 id="main-title">Fornecedores</h1>
    <?php if (count($contacts) > 0) : ?>
        <table class="table" id="contacts-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) : ?>
                    <tr>
                        <td scope="row" class="col-id"><?= $contact["id"] ?></td>
                        <td scope="row"><?= $contact["name"] ?></td>
                        <td scope="row"><?= $contact["email"] ?></td>
                        <td scope="row"><?= $contact["phone"] ?></td>
                        <td scope="row"><?= $contact["description"] ?></td>
                        <td class="actions">
                            <a href="<?= $BASE_URL ?>show.php?id=<?= $contact["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                            <a href="<?= $BASE_URL ?>edit.php?id=<?= $contact["id"] ?>"><i class="far fa-edit edit-icon"></i></a>

                            <form class="delete-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                                <button class="delete-btn" type="submit"><i class="fas fa-times delete-icon"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p id="empty-list-text">Não há nenhum contato cadastrado, <a href="<?= $BASE_URL ?>create.php">Clique aqui para adcionar.</a></p>
    <?php endif; ?>
</div>

<?php
include_once("template/footer.php");
?>
