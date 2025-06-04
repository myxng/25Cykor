<?php
include 'db.php';

$result = $mysqli->query("SELECT * FROM posts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read</title>
    <body>
        <h2>Lists</h2>
        <p><a href="index.php"><button type="submit">Go to Main</button></a></p>
        
        <?php
        echo "No. |&nbsp;&nbsp;&nbsp; Title &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Writer &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Create Time";
        while ($row=mysqli_fetch_assoc($result))
        {
            echo "<p>";
            echo $row['id'] . " |&nbsp;&nbsp;&nbsp; " . $row['title'] . " &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; " . $row['author'] . " &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; " . $row['created_at'];
            echo "</p>";
        }
        ?>

        

    </body>
</html>