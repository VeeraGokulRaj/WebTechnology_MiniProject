<?php
    $con = new mysqli("localhost", "root", "", "miniproject"); //DataBase connectivity FileReq '$reqFile'
    if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
    }
    $query = "select * from od_details";
    $res = mysqli_query($con, $query);
    $numRow = mysqli_num_rows($res);
    if ($numRow > 0) {
        echo '<table class="dataFetch">';
        echo '<tr>';
        echo '<th>Name</th>';
        echo '<th>Regno</th>';
        echo '<th>ODstDate</th>';
        echo '<th>ODendDate</th>';
        echo '<th>ODreqDays</th>';
        echo '<th>Reason</th>';
        echo '<th>Status</th>';
        echo '</tr>';
        while ($row = mysqli_fetch_assoc($res)) {
            $DocReq = $row['FileReq'];
            echo '<pre>';

            echo '<tr>';
            echo '<td>' . $row['Name'] . '</td>';
            echo '<td>' . $row['Regno'] . '</td>';
            echo '<td>' . $row['ODstDate'] . '</td>';
            echo '<td>' . $row['ODendDate'] . '</td>';
            echo '<td>' . $row['ODreqDays'] . '</td>';
            echo '<td>' . $row['Reason'] . '</td>';
            echo "<td>" . $row['Status'] . "</td>";
            echo '</tr>';

            echo '<pre>';
        }
        echo "</table>";
    } else {
        echo    "<h3 class='recNotFound'style='color: green;font-size: 30px;  text-align: center;'>Record not Found!</h3>";
    }
?>