<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <h3>Dane z tabeli user</h3>

    <table>
        <tr>
            <th>ID</th>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>Data urodzenia</th>
            <th>Miasto</th>
        </tr>
    



<?php
    require_once 'connect.php';

   // $sql = 'Select * from user';
    $sql = "SELECT `city`.`Miasto`, `user`.`id`, user.name,user.surname,user.birthday FROM `city` INNER JOIN `user` ON `user`.`cityid` = `city`.`cityid`";
    $result = mysqli_query($connect, $sql);


    echo <<<TABLE

TABLE;
    while ($row = mysqli_fetch_assoc($result)){

        echo <<<ROW
        <tr>
        <td>$row[id]</td>
        <td>$row[name]</td>
        <td>$row[surname]</td>
        <td>$row[birthday]</td>
        <td>$row[Miasto]</td>
        </tr>
ROW;

    }

    ?>
    </table>


</body>
</html>