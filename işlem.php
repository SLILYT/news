<?php
include "./bağlan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["işlem"]) && $_GET["işlem"] == "contact") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
    if (empty($email)) {
        echo "e mail boş olamaz";

    } else {
        $sql = "INSERT INTO iletişim (name, email, message)
  VALUES ('$name', '$email', '$message')";

        $conn->exec($sql);


    }

    var_dump($_POST);
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["işlem"]) && $_GET["işlem"] == "register") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $password_confirmation = htmlspecialchars($_POST["password_confirmation"]);

    if ($password != $password_confirmation) {
        echo "Şifreler uyuşmuyor";
        return;

    }

    $stmt = $conn->prepare("select * from users where email=:email");
    $stmt->bindParam(':email', $email);
    

    $stmt->execute();
  if ($stmt->rowCount()>0) {
    echo "Bu email kayıtlı";
    return;
  }


    $password = password_hash($password, PASSWORD_DEFAULT);


    $stmt = $conn->prepare("INSERT INTO  users (name, email, password)
    VALUES (:name, :email, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    header("location: auth/login.php");



}
?>