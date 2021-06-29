<?php
include_once("template/header.php");
?>

<div class="container" id="view-contact-container">
    
    <?php include_once("template/buttonback.html"); ?>

    <h1 id="main_title"><?= $contact['name'] ?></h1>
        
    <p class="bold">Telefone:</p>
    <p><?= $contact['phone'] ?></p>

    <p class="bold">Email:</p>
    <p><?= $contact['email'] ?></p>

    <p class="bold">Descrição:</p>
    <p><?= $contact['description'] ?></p>   
</div>

<?php
include_once("template/footer.php");
?>