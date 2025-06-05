<?php
include "db.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read</title>
        <style>
            table {
                border-collapse: collapse;
                width: 80%;
                margin-top: 15px;
            }
            th, td {
                border: 1px solid #999;
                padding: 10px;
                text-align: center;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    <body>
        <h2>Lists</h2>
        <a href="index.php"><button>Go to Main</button></a>

        <table>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Writer</th>
                <th>Create Time</th>
            </tr>

        <?php
        $result = $mysqli->query("SELECT * FROM posts ORDER BY id DESC");
        $num = 1;

        while ($row=mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>$num</td>";
            echo "<td><a href='view.php?id={$row['id']}'>{$row['title']}</a></td>";
            echo "<td>{$row['author']}</td>";
            echo "<td>{$row['created_at']}</td>";
            echo "</tr>";
            $num++;
        }
        ?>

        </table>
    </body>
</html>