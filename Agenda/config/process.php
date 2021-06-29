<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");
   
    $data = $_POST;
    //modifica db
    if(!empty($data)){

    //CREATE
    if($data["type"] === "create") {

        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $description = $data["description"];
        
        $query = "INSERT INTO contacts(name, email, phone, description) VALUES (:name, :email, :phone, :description)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":description", $description);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Cadastrado com sucesso!";

        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    } else if($data["type"] === "edit") {

        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $description = $data["description"];
        $id = $data["id"];

        $query = "UPDATE contacts 
                  SET name = :name, email = :email,  phone = :phone, description = :description 
                  WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Atualizado com sucesso!";
            
        
        } catch (PDOException $e) {
            
            $error = $e->getMessage();
            echo "Erro: $e";
        }
    
    // DELETE

    } else if ($data["type"] === "delete") {

        $id = $data["id"];

        $query = "DELETE FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato removido com sucesso!";
        } catch (PDOException $e) {
            // verificando erro
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    }

    //redirect HOME
    header("location:" . $BASE_URL . "../index.php");
    

    //SELECT    
    } else {

    $id;
    if (!empty($_GET))
        $id = $_GET["id"];

    //Retorna contato específico

    if (!empty($id)) {

        $query = "SELECT * FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam("id", $id);

        $stmt->execute();

        $contact = $stmt->fetch();
    } else {

        //Retorna todos contatos
        $contacts = [];

        $query = "SELECT * FROM contacts";

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $contacts = $stmt->fetchAll();
    }
 }
 //fechar conexão 
 $conn = null;  

?>