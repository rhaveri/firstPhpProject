<?php
session_start();
include "connection.php";
include "functions.php";

require 'header.php';
$user_data = check_login($con);


?>


<!DOCTYPE html>
<html>
<head>
    <title>My website</title>
</head>
<body>

<h1>This is the index page</h1>

<br>
Hello, <?php echo $user_data['username'] ?>


<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Book title</th>
            <th>author</th>
            <th>pages</th>
            <th>isbn</th>
            <th>publication date</th>
        </tr>



        <!--from json to index shown - the data-->
        <!--        --><?php
        //
        //        $data = file_get_contents('books.json');
        //        $data = json_decode($data, true);
        //        foreach ($data as $item) {
        //
        //            echo '<tr>';
        //            echo '<td>' . $item['title'] . '</td>';
        //            echo '<td>' . $item['author'] . '</td>';
        //            echo '<td>' . $item['pages'] . '</td>';
        //            echo '<td>' . $item['isbn'] . '</td>';
        //            echo ' <td>' .$item['prodDate'] . ' </td> ';
        //
        //            echo '</tr > ';
        //
        //        }
        //
        //        ?>


        <?php



            //get/retrieve books from db
            $query = "select * from books ";

            $result = mysqli_query($con, $query);


            if ($result && mysqli_num_rows($result) > 0) {

                while($books_data = mysqli_fetch_assoc($result)) {

                        echo "<tr>";
                        echo "<td>" . $books_data["title"] . "</td>";
                        echo "<td>" . $books_data["author"] . "</td>";
                        echo "<td>" . $books_data["pages"] . "</td>";
                        echo "<td>" . $books_data["ISBN"] . "</td>";
                        echo "<td>" . $books_data["productionDate"] . "</td>";
                        echo "<td><a class='btn btn-danger' href='d.php?deleteid=".$books_data['id']."'> Delete</a></td>";
                        echo "</tr>";
                    }

            }




        ?>

    </table>
</div>

</body>
</html>