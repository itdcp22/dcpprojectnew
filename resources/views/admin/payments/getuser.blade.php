<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head>

<body>

    <?php
 
   

    $con = mysqli_connect('localhost', 'root', '', 'abdullah');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    
    mysqli_select_db($con, "suppliers");
    $sql = "SELECT * FROM suppliers";
    $result = mysqli_query($con, $sql);

    echo "<table>
<tr>
<th>ID</th>

</tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
      
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($con);
    ?>
</body>

</html>