<?php 

require 'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>People</title>
</head>
<style>
    th, td {
        padding: 10px;
    }
    th {
        background: #606060;
        color: white;
    }
    td {
        background: #b5b5b5;
    }
</style>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>City of Birth</th>
        </tr>
        <?php
            $people = mysqli_query($connect, "SELECT * FROM `people`");
            $people = mysqli_fetch_all($people);
            foreach ($people as $human) {
                ?>

                <tr>
                    <td><?=  $human[0] ?></td>
                    <td><?=  $human[1] ?></td>
                    <td><?=  $human[2] ?></td>
                    <td><?=  $human[3] ?></td>
                    <td><?=  $human[4] ?></td>
                    <td><?=  $human[5] ?></td>
                    <td><a href="delete.php?id=<?=  $human[0] ?>">Delete</a></td>
                    <td><a href="age.php?id=<?=  $human[0] ?>">View</a></td>
                </tr>

                <?php
            }
        ?>
    </table>
    <h3>Add new person</h3>
    <form action="create.php" method="post">
        <p>Name</p>
        <input type="text" name="name">
        <p>Surname</p>
        <input type="text" name="surname">
        <p>Date of Birth</p>
        <input type="date" name="dateofbirth">
        <p>Gender</p>
        <select name="gender">
            <option value=NULL>Specify gender</option>
            <option value="0">Female</option>
            <option value="1">Male</option>
        </select>
        <p>City of Birth</p>
        <input type="text" name="cityofbirth"> <br><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
