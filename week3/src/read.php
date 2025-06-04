<?php
include "db.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read</title>
    <body>
        <h2>Lists</h2>
        <p><a href="index.php"><button>Go to Main</button></a></p>
        
        <table>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Writer</th>
                <th>Create Time</th>
            </tr>

        <?php
        $result = $mysqli->query("SELECT * FROM posts ORDER BY id DESC");

        while ($row=mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$row['author']}</td>";
            echo "<td>{$row['created_at']}</td>";
            echo "</tr>";
        }
        ?>

        </table>
    </body>
</html>