<!DOCTYPE html>
<html>
    <head>
        <title></title>
    <body>
        <h1>Hello, World!</h1>
        <form action="login.php" method="post">
            <p><input type="text" name="id" placeholder="ID"></p>
            <p><input type="text" name="password" placeholder="PW"></p>
            <p><button type="submit">Login</button></p>
        </form>

        <a href="create.php">Create</a>
        <form action="create_process.php" method="post">
        <a href="read.php">Read</a><br>
        <form action="read_process.php" method="post">
        <a href="update.php">Update</a><br>
        <form action="update_process.php" method="post">
        <a href="delete.php">Delete</a><br>
        <form action="delete_process.php" method="post">
    </body>
</html>