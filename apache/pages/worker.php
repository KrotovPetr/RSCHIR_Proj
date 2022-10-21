<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<ol>
    <?php
    $mysqli = new mysqli("db", "admin", "admin", "appDB");
    $result = $mysqli->query("SELECT * FROM workers");
    foreach ($result as $row){
        echo "<li>{$row['surname']} {$row['name']}</li>";
    }
    ?>
</ol>
<a href="index.html">На главную</a>
<br>
<a href="admin/admin.php">Страница администратора</a>
</body>
</html>