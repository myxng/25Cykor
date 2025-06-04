<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $id = $_POST['id'];
    $pw = $_POST['pw'];

    $result = $mysqli->query("SELECT * FROM users WHERE id='$id'");

    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();

        if ($row['pw']===$pw)
        {
            $_SESSION['id'] = $row['id'];
            header("Location: index.php");
            exit;
        }
        else
        {
            echo "Wrong Password";
        }
    }
    else
    {
        echo "Not Existing ID. Register First!";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    <body>
        <h2>Login</h2>
        <form method="post">
            <p><input type="text" name="id" placeholder="ID"></p>
            <p><input type="password" name="pw" placeholder="PW"></p>
            <button type="submit">Login</button>
            <a href="register.php"><button type="button">Register</button></a>
        </form>

        <p><a href="index.php"><button type="submit">Go to Main</button></a></p>

    </body>
</html>